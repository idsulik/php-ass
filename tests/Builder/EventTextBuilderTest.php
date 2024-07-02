<?php

namespace PhpAss\Tests\Builder;

use PhpAss\Builder\EventTextBuilder;
use PHPUnit\Framework\TestCase;

class EventTextBuilderTest extends TestCase
{
    public function testBuildWithAllCommands()
    {
        $builder = new EventTextBuilder();

        $builder
            ->addPlainText('Normal Text Before ')
            ->addBoldText('Bold ')
            ->addItalicText('Italic ')
            ->addUnderlineText('Underline ')
            ->addStrikeoutText('Strikeout ')
            ->addFont('Arial')
            ->addFontSize(24)
            ->addPrimaryColor('FF0000')
            ->addSecondaryColor('00FF00')
            ->addOutlineColor('0000FF')
            ->addBackColor('FFFF00')
            ->addOutline(2)
            ->addShadow(3)
            ->addAlignment(5)
            ->addPosition(100.5, 200.75)
            ->addMove(0, 0, 100, 100, 1, 2)
            ->addFade(255, 128, 64, 0, 1000, 2000, 3000)
            ->addTransition(0, 1000, '1.0')
            ->resetStyle()
            ->addPlainText('Normal Text After');

        $expected = 'Normal Text Before {\b1}Bold {\b0}{\i1}Italic {\i0}{\u1}Underline {\u0}{\s1}Strikeout {\s0}{\fnArial}{\fs24}{\c&HFF0000&}{\2c&H00FF00&}{\3c&H0000FF&}{\4c&HFFFF00&}{\bord2}{\shad3}{\an5}{\pos(100.5,200.75)}{\move(0,0,100,100,1,2)}{\fade(255,128,64,0,1000,2000,3000)}{\t(0,1000,1.0)}{\r}Normal Text After';

        $this->assertEquals($expected, $builder->build());
    }

    public function testAddPlainText()
    {
        $builder = new EventTextBuilder();
        $builder->addPlainText('Hello, World!');
        $this->assertEquals('Hello, World!', $builder->build());
    }

    public function testAddBoldText()
    {
        $builder = new EventTextBuilder();
        $builder->addBoldText('Bold Text');
        $this->assertEquals('{\b1}Bold Text{\b0}', $builder->build());
    }

    public function testAddItalicText()
    {
        $builder = new EventTextBuilder();
        $builder->addItalicText('Italic Text');
        $this->assertEquals('{\i1}Italic Text{\i0}', $builder->build());
    }

    public function testAddUnderlineText()
    {
        $builder = new EventTextBuilder();
        $builder->addUnderlineText('Underline Text');
        $this->assertEquals('{\u1}Underline Text{\u0}', $builder->build());
    }

    public function testAddStrikeoutText()
    {
        $builder = new EventTextBuilder();
        $builder->addStrikeoutText('Strikeout Text');
        $this->assertEquals('{\s1}Strikeout Text{\s0}', $builder->build());
    }

    public function testAddFont()
    {
        $builder = new EventTextBuilder();
        $builder->addFont('Arial');
        $this->assertEquals('{\fnArial}', $builder->build());
    }

    public function testAddFontSize()
    {
        $builder = new EventTextBuilder();
        $builder->addFontSize(24);
        $this->assertEquals('{\fs24}', $builder->build());
    }

    public function testAddPrimaryColor()
    {
        $builder = new EventTextBuilder();
        $builder->addPrimaryColor('FF0000');
        $this->assertEquals('{\c&HFF0000&}', $builder->build());
    }

    public function testAddSecondaryColor()
    {
        $builder = new EventTextBuilder();
        $builder->addSecondaryColor('00FF00');
        $this->assertEquals('{\2c&H00FF00&}', $builder->build());
    }

    public function testAddOutlineColor()
    {
        $builder = new EventTextBuilder();
        $builder->addOutlineColor('0000FF');
        $this->assertEquals('{\3c&H0000FF&}', $builder->build());
    }

    public function testAddBackColor()
    {
        $builder = new EventTextBuilder();
        $builder->addBackColor('FFFF00');
        $this->assertEquals('{\4c&HFFFF00&}', $builder->build());
    }

    public function testAddOutline()
    {
        $builder = new EventTextBuilder();
        $builder->addOutline(2);
        $this->assertEquals('{\bord2}', $builder->build());
    }

    public function testAddShadow()
    {
        $builder = new EventTextBuilder();
        $builder->addShadow(3);
        $this->assertEquals('{\shad3}', $builder->build());
    }

    public function testAddAlignment()
    {
        $builder = new EventTextBuilder();
        $builder->addAlignment(5);
        $this->assertEquals('{\an5}', $builder->build());
    }

    public function testAddPosition()
    {
        $builder = new EventTextBuilder();
        $builder->addPosition(100.5, 200.75);
        $this->assertEquals('{\pos(100.5,200.75)}', $builder->build());
    }

    public function testAddMoveWithoutTime()
    {
        $builder = new EventTextBuilder();
        $builder->addMove(0, 0, 100, 100);
        $this->assertEquals('{\move(0,0,100,100)}', $builder->build());
    }

    public function testAddMoveWithTime()
    {
        $builder = new EventTextBuilder();
        $builder->addMove(0, 0, 100, 100, 1, 2);
        $this->assertEquals('{\move(0,0,100,100,1,2)}', $builder->build());
    }

    public function testAddFade()
    {
        $builder = new EventTextBuilder();
        $builder->addFade(255, 128, 64, 0, 1000, 2000, 3000);
        $this->assertEquals('{\fade(255,128,64,0,1000,2000,3000)}', $builder->build());
    }

    public function testAddTransition()
    {
        $builder = new EventTextBuilder();
        $builder->addTransition(0, 1000, '1.0');
        $this->assertEquals('{\t(0,1000,1.0)}', $builder->build());
    }

    public function testResetStyle()
    {
        $builder = new EventTextBuilder();
        $builder->addBoldText('Bold')->resetStyle()->addPlainText('Normal');
        $this->assertEquals('{\b1}Bold{\b0}{\r}Normal', $builder->build());
    }
}