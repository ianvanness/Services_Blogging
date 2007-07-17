<?php
require_once 'Services/Blogging/Post.php';

/**
* A PHP interface to blogging APIs
*
* @category Services
* @package  Services_Blogging
* @author   Anant Narayanan <anant@php.net>
* @author   Christian Weiske <cweiske@php.net>
* @license  http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
* @link     http://pear.php.net/package/Services_Blogging
*/
abstract class Services_Blogging_Driver
{

    /**
    * Error code: Username or password doesn't exist/are wrong
    */
    const ERROR_USERIDPASS = 102;



    /**
    * Save a new post into the blog.
    *
    * @param Services_Blogging_Post $post Post object to put online
    *
    * @return string The ID assigned to the post
    */
    abstract public function savePost(Services_Blogging_Post $post);



    /**
    * Delete a given post
    *
    * @param mixed $post Services_Blogging_Post object to delete,
    *                     or post id (integer) to delete
    *
    * @return boolean True if deleted, false if not.
    */
    abstract public function deletePost($post);




    /**
    * Returns an array of strings thay define
    * the properties that a post to this blog may
    * have.
    *
    * @return array Array of strings
    */
    abstract public function getSupportedPostProperties();



    /**
    * Checks if the given property name/id is supported
    * for this driver.
    *
    * @param string $strProperty Property name/id to check
    *
    * @return boolean If the property is supported
    */
    abstract public function isPostPropertySupported($strProperty);



    /**
    * Creates a new post object and returns that.
    * Automatically sets the driver object in the post.
    *
    * @return Services_Blogging_Post New post object
    */
    public function createNewPost()
    {
        return new Services_Blogging_Post($this);
    }//public function createNewPost()

}//abstract class Services_Blogging_Driver
?>