<?php
    class matches{

        private $_teamDom;
        private $_teamExt;
        private $_bdd;

        public function __construct($dom,$ext,$bdd)
        {
            $this->_teamDom = $dom;
            $this->_teamExt = $ext;
            $this->_bdd = $bdd;
        }

        public function getTeamDom(){
            return $this->_teamDom;
        }
        public function getTeamExt(){
            return $this->_teamExt;
        }
}

?>