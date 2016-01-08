<?php
session_start();
  include_once 'Animal.php';
  include_once 'Mamifero.php';
  include_once 'Gato.php';
  include_once 'Ave.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
      <header><h1>Animales</h1></header>
      <section>
          <article>
              
    <?php
      $animal1 = new Animal("femenino", 6, "Pepita");
      echo $animal1;
      $animal1->comer();
      $animal1->mirar();
      $animal1->tomarSol();
      unset($animal1);
      
      echo "<hr>";
      echo "Numero Anmales Creados: ".Animal::getnumAnimales()."<hr>";
      $mamifero1 = new Mamifero("masculino",5,"Adolfito",4,"carnivoro");
      $mamifero1->comer();
      $mamifero1->mirar();
      $mamifero1->tomarSol();
      $mamifero1->marcar();
      $mamifero1->correr();
      $mamifero1->dormir();
      echo $mamifero1;
      unset($mamifero1);
      echo "<hr>";
      echo "Numero Anmales Creados: ".Animal::getnumAnimales()."<hr>";
      echo "Numero Mamiferos Creados: ".Mamifero::getnumMamiferos()."<hr>";
      
      $ave1 = new Ave("femenino",0.5,"Piolin","Bosque humedo");
      $ave1->comer();
      $ave1->mirar();
      $ave1->tomarSol();
      $ave1->volar();
      $ave1->ponerHuevos(5);
      $ave1->cantar();
      echo $ave1;
      unset($ave1);
      echo "<hr>";
      echo "Numero Anmales Creados: ".Animal::getnumAnimales()."<hr>";
      echo "Numero Aves Creados: ".Ave::getnumAve()."<hr>";
      
      $gato1 = new Gato("macho",7,"Torete",6,"omnivoro","común europeo","blanco y negro");
      $gato1->comer();
      $gato1->mirar();
      $gato1->tomarSol();
      $gato1->marcar();
      $gato1->rascarSofa();
      $gato1->maullar();
      echo $gato1;
      unset($gato1);
      echo "<hr>";
      echo "Numero Anmales Creados: ".Animal::getnumAnimales()."<hr>";
      echo "Numero Mamiferos Creados: ".Mamifero::getnumMamiferos()."<hr>";
      echo "Numero Gatos Creados: ".Gato::getnumGatos()."<hr>";
    ?>

          </article>
      </section>
  </body>
</html>
