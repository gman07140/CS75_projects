<?php

    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */

    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handler;
        if (!isset($handler))
        {
            try
        {
        $handler = new PDO('mysql:host=127.0.0.1;dbname=bart','root','Drthun90');
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(PDOException $e) 
        {
        echo $e->getMessage();
        }
        }

        // prepare SQL statement
        $statement = $handler->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handler->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            $colcount = $statement->columnCount();
            if ($colcount == 0)
            {
                return false;
            }
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {   
            return false;
        }   
    }

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            require("templates/bart_header.php");

            // render template
            require("templates/$template");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }
?>
