<?php

/**
 *
 * Class with only static methods which will be used to return our array of categories.
 *
 * Created by PhpStorm.
 * User: Michael Kovalsky
 * Date: 4/14/2017
 * Time: 12:16 PM
 */
class UserCategories
{
    private static $sports = array();
    private static $politics = array();
    private static $entertainment = array();
    private static $technology = array();
    private static $food = array();
    private static $other = array();

    /**
     * @return array
     */
    public static function getSports()
    {
        self::$sports = array("football", "NFL", "NCAA", "Superbowl", "Falcons", "Dodgers", "Bulldawgs", "Georgia Bulldawgs", "Yellow Jackets", "NFL", "SEC"
        , "basketball", "NBA", "March Madness", "baseball", "MLB", "world series", "tennis", "soccer", "NASCAR", "olympics", "golf", "Augusta");
        return self::$sports;
    }

    /**
     * @return array
     */
    public static function getPolitics()
    {
        self::$politics = array("Russia", "Syria", "France", "Belgium", "London", "Moscow", "Washington", "North Korea", "China", "Beijing", "Nuclear", "Nuclear War",
            "Terrorism", "War on Terror", "War on Drugs", "Police Brutality", "Senate", "House", "Duma", "Communist", "Communism", "Socialist", "Fascist", "Trump", "Putin",
            "Kim Jong Un", "CIA", "WikiLeaks", "Russian Hacking", "Elections", "Hillary Clinton", "Clinton", "Donald Trump", "President", "POTUS", "Debate", "CNN", "Fox News",
            "BBC", "Liberal", "Conservative", "State of the Union", "Homosexuality", "Black Lives Matter", "BLM", "Obama");
        return self::$politics;
    }

    /**
     * @return array
     */
    public static function getEntertainment()
    {
        self::$entertainment = array("TV", "MTV", "HBO", "Game of Thrones", "GOT", "Sex", "Sexy", "Fashion", "Marriage", "SNL", "Reddit", "AMA", "Golden Globes", "Music", "Billboard Music Awards",
            "BMA", "Oscars", "Miss Universe", "Pageant", "Rap", "Hip-Hop", "Hip Hop", "RNB", "R&B", "Classic Music", "Metal", "Elvis", "YouTube");
        return self::$entertainment;
    }

    /**
     * @return array
     */
    public static function getTechnology()
    {
        self::$technology = array("Microsft", "Google", "Apple", "Toshiba", "iPhone", "Android", "Windows", "Mac", "iPad", "Surface", "Tablet", "Yahoo", "Verizon", "Samsung",
            "Uber", "Adobe", "Photoshop", "AI", "Self Driving Cars", "Video Games", "LG", "OSX", "Windows 10");
        return self::$technology;
    }

    /**
     * @return array
     */
    public static function getFood()
    {
        self::$food = array("Wendys", "McDonalds", "Wendy's", "Chic Fil A", "Chic-Fil-a", "Burger", "TGI", "BBQ", "Grilling", "Wine", "Tasty", "Yum", "IHOP", "Pancakes", "Pizza", "Cake"
        ,"Baking");
        return self::$food;
    }

    /**
     * @return array
     */
    public static function getOther()
    {
        return self::$other;
    }

    

}