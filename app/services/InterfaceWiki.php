<?php

    interface InterfaceWiki {
        public function addWiki(Wiki $newWiki , $tags = []);
        public function fetchAllWikis();
    }


?>