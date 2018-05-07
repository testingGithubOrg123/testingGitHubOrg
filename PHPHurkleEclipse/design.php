<?php
/**
 * SECTION 1: a WidgetHelper interface and two different implementations.
 * Normally we would inject the chosen WidgetHelper to the Client class, but
 * creating all possible helpers renders the constructor enormous, whilst we
 * are not even sure that they would be actually used.
 *
 * This class purpose is to generate blinking text in spite of all
 * usability recommendations. This is the AbstractProduct.
 */
interface WidgetHelper
{
    /**
     * @return string
     */
    public function generateHtml($text);
}

/**
 * Implementation that generates html tied to a javascript library.
 * This is one ConcreteProduct.
 */
class JavascriptWidgetHelper implements WidgetHelper
{
    public function generateHtml($text)
    {
        return '<div dojoType="...">' . $text . '</div>';
    }
}

/**
 * Implementation that generates html that loads a flash object.
 * This is one ConcreteProduct.
 */
class FlashWidgetHelper implements WidgetHelper
{
    public function generateHtml($text)
    {
        return '<object>
        <param name="text">' . $text . '</param>
        </object>';
    }
}

/**
 * SECTION 2: since we are not going to pass the instances of WidgetHelper to
 * the Client class (because they do not exist yet), we need an interface
 * for the creator of these WidgetHelpers, which results in an Abstract Factory.
 * This is the collaborator which would be injected in the client.
 */
interface WidgetHelperAbstractFactory
{
    /**
     * @return Widget
     */
    public function createWidgetHelper();
}

/**
 * First implementation: creates a Javascript-based helper.
 * This is one ConcreteFactory.
 */
class JavascriptHelperFactory implements WidgetHelperAbstractFactory
{
    public function createWidgetHelper()
    {
        return new JavascriptWidgetHelper();
    }
}

/**
 * Second implementation: creates a Flash-based helper.
 * This is one ConcreteFactory.
 */
class FlashHelperFactory implements WidgetHelperAbstractFactory
{
    public function createWidgetHelper()
    {
        return new FlashWidgetHelper();
    }
}

/**
 * Third implementation: creates a random type of helper.
 * Note that commonly the WidgetHelperAbstractFactory interface will require
 * methods to create all the helpers needed. It's up to the single
 * ConcreteFactory implementation to instantiate a family of objects
 * (flash|javascript html bindings generators) or another,
 * or even a mixture of different families or whatever.
 * Dependency Injection containers take this approach to the extreme,
 * providing automatically configurable factories for every
 * concrete class.
 */
class RandomHelperFactory implements WidgetHelperAbstractFactory
{
    public function createWidgetHelper()
    {
        srand();
        if (rand() > 0.5) {
            return new JavascriptWidgetHelper();
        } else {
            return new FlashWidgetHelper();
        }
    }
}

/**
 * SECTION 3: a Client class that uses an AbstractFactory to create Widget
 * instances whenever it wants.
 * Note that this class only depends on abstractions (AstractFactory and its
 * AbstractProduct). However, since php has no compile-time dependencies,
 * an interface for the Products or the Factories is not mandatory.
 */
class LoginPage
{
    private $_widgetFactory;

    public function __construct(WidgetHelperAbstractFactory $factory)
    {
        $this->_widgetHelperFactory = $factory;
    }

    public function render()
    {
        $userId = uniqid('User ');
        // insert all the logic needed here...
        if (true or $complexBusinessLogicRules) {
            $helper = $this->_widgetHelperFactory->createWidgetHelper();
            return $helper->generateHtml("Welcome, $userId");
        }
    }
}

$page = new LoginPage(new FlashHelperFactory());
echo $page->render(), "\n";
$page = new LoginPage(new JavascriptHelperFactory());
echo $page->render(), "\n";
