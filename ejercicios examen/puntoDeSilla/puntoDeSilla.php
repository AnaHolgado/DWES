<!--
Nombre: Ana Holgado
Curso: DAW2
Fecha: 21/10/2015
Turno: 1
-->
<!DOCTYPE html> 

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="keywords" content="Ejercicios PHP">
	<meta name="author" content="Ana Holgado">
	<title>Aprende PHP</title>  
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head> 
    
    <body> 
        <header id = "header">
            <h1>PUNTO DE SILLA</h1>
            <h2><a href= "index.php">PUNTO DE SILLA </a></h2>
	</header>
        <nav>
            <ul><li></li></ul>
        </nav>
        <section>
            <article>
                <h3>Punto de Silla</h3>
                <p> Buscar los números que son mínimos en su fila y máximo en su columna. </p>
            </article>
            <article>
                <h3>Ejercicio Resuelto</h3>
                <p>Matriz Original</p>
                <?php
                for ($i = 0; $i < 5 ; $i++){
                    for ($j = 0; $j <5; $j++){
                        $matrizOriginal[$i][$j] = rand(10,30);
                    }
                }
                
                //Impirmir la matriz original
                echo "<table><tr><th></th><th>1</th><th>2</th><th>3</th><th>4</th>"
                . "<th>5</th></tr>";
                for ($i = 0; $i < 5 ; $i++){
                    echo "<tr><th>".($i+1)."</th>";
                        for ($j = 0; $j <5; $j++){
                            echo "<td>".$matrizOriginal[$i][$j]."</td>";
                        }
                    echo "</tr>";
                }
                echo "</table>";
                //Fin de la impresion de la matriz original
                ?>
    </article>
    <article>
        <h3>Resultado</h3>
        <p>Matriz Nueva
        <?php
        
                // Mientras imprimo compruebo si es punto de silla
                echo "<table><tr><th></th><th>1</th><th>2</th><th>3</th><th>4</th>"
                . "<th>5</th></tr>";
                for ($i = 0; $i < 5 ; $i++){
                    echo "<tr><th>".($i+1)."</th>";
                    for ($j = 0 ; $j < 5 ; $j++){
                        $matrizFila[$j] = $matrizOriginal[$i][$j];
                    }
                    for ($j = 0 ; $j < 5 ; $j++){
                        for($k = 0 ; $k <5 ; $k++){
                            $matrizColumna[$k] = $matrizOriginal[$k][$j];
                        }
                        if (min($matrizFila)== max($matrizColumna)){
                            echo "<td class='green'>".$matrizOriginal[$i][$j]."</td>";
                        }else {
                            echo "<td>".$matrizOriginal[$i][$j]."</td>";
                        }
                    }
                    
                    echo "</tr>";
                }
                echo "<table>";
                
            
        ?>
        </p>
        </article>
        </section>
        <footer>
            <p  align="center" class="texto"> Página realizada por Ana Holgado Infante. <br>I.E.S. Campanillas. Desarrollo Web en Entorno Servidor.</p>
        </footer>
    </body> 
</html>