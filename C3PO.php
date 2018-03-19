<?php
class C3PO extends Robot
{
    static protected $numeroDeSerie;
    private $nom, $type = 'droide de protocole';
    function __construct($_nom/* = 'C3PO'*/)
    {
        $this->setNom($_nom);
        $this::addNumeroDeSerie();
        echo "Je suis le droide de protocole numéro ".$this::getNumeroDeSerie().", enchanté de vous rencontrer !\n";
    }
    public static function getNumeroDeSerie()
    {
        return self::$numeroDeSerie;
    }
    private static function addNumeroDeSerie()
    {
        return self::$numeroDeSerie++;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function dire($str)
    {
        echo "C3PO no ".$this::getNumeroDeSerie()." : ".$str."\n";
    }
    public function marcher()
    {

        echo "Je me mets en route, inutile d’insister.\n";
    }
    public function initierProtocole()
    {
        $str = '';
        while ($str !== 'repos') {
            $test = new ReflectionClass('C3PO');
            $robotref = new ReflectionClass('Robot');
            $stdin = fopen('php://stdin', 'r');
            echo "En attente d’interaction utilisateur :\n";
            $str = trim(fgets(STDIN));
            $com = strtok($str, " ");
            $para = str_replace('"', "", substr($str, strpos($str, '"') + 1, strlen($str)));
            if ($test->hasMethod($com)) {

                self::$com($para);
            }
            elseif ($robotref->hasMethod($com)) {
                parent::$com($para);
            }
            elseif ($str == 'repos'){}
            /*elseif ($str == 'help') {
                $arr = $test->getMethod;
                echo "Methode Disponible :\n\n\n";
                foreach ($arr as $key => $value) {
                    echo $value."\n";
            }*/
            else {
                echo "Methode inconnu !\n";
            }
        }
        echo "Fin du protocole\n";
    }
}/*
$testa = new C3PO('testt');
echo $testa->initierProtocole();*/