<?php

        function sanitizeInput($input) {
            // Trim leading and trailing whitespaces
            $input = trim($input);
        
            // Remove HTML and PHP tags
            $input = filter_var($input, FILTER_SANITIZE_STRING);
        
            // Convert special characters to HTML entities
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        
            return $input;
        }


?>