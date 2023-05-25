<?php 
require_once ("config.php");
$data = new Config();

$id =  $_GET['id'];
$data->setId($id);

$record = $data->selectOne();
/* print_r($record); */
$val =$record[0];
echo "<br>";
print_r($val);
 
if (isset($_POST['editar'])) {
    $data->setNombres($_POST['nombres']);
    $data->setDireccion($_POST['direccion']);
    $data->setLogros($_POST['logros']);
    $data->setSkill($_POST['skill']);
    $data->setIngles($_POST['ingles']);
    $data->setSer($_POST['ser']);
    $data->setReview($_POST['review']);
    $data->setEspecialidad($_POST['especialidad']);

    $data->update();
    echo "<script>alert('Datos Actualizados exitosamente');document.location='estudiantes.php'</script>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Estudiante</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="css/estudiantes.css">

</head>

<body>
    <div class="contenedor">

        <div class="parte-izquierda">

        <div class="perfil">
            <h3 style="margin-bottom: 2rem;">Camp Skiler.</h3>
            <img src="images/Diseño sin título.png" alt="" class="imagenPerfil">
            <h3 >Maicol Estrada</h3>
        </div>
        <div class="menus">
            <a href="home.html" style="display: flex;gap:2px;">
            <i class="bi bi-house-door"> </i>
            <h3 style="margin: 0px;font-weight: 800;">Home</h3>
            </a>
            <a href="/Estudiantes/Estudiantes.html" style="display: flex;gap:2px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;">Estudiantes</h3>
            </a>
        </div>
        </div>

        <div class="parte-media">
            <h2 class="m-2">Estudiante a Editar</h2>
        <div class="menuTabla contenedor2">
        <form class="col d-flex flex-wrap" action=""  method="post">
                <div class="mb-1 col-12">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input 
                    type="text"
                    id="nombres"
                    name="nombres"
                    class="form-control"  
                        value= "<?php echo $val['NOMBRES']; ?>"
                    />
                </div>

                <div class="mb-1 col-12">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input 
                    type="text"
                    id="direccion"
                    name="direccion"
                    class="form-control"  
                    value= "<?php echo $val['DIRECCION']; ?>"

                    
                    />
                </div>

                <div class="mb-1 col-12">
                    <label for="logros" class="form-label">Logros</label>
                    <input 
                    type="text"
                    id="logros"
                    name="logros"
                    class="form-control"  
                    value= "<?php echo $val['LOGROS']; ?>"

                    
                    />
                </div>
                <div class="mb-1 col-6">
                <label for="skill" class="form-label">Skill</label>
                <input 
                  type="text"
                  id="skill"
                  name="skill"
                  class="form-control"
                  value= "<?php echo $val['SKILL']; ?>"
                />
              </div>
              <div class="mb-1 col-6">
                <label for="ingles" class="form-label">Ingles</label>
                <select name="ingles" id="ingles" class="form-select"  >
                  <option selected value= "<?php echo $val['INGLES']; ?>"><?php echo $val['INGLES']; ?></option>
                  <option value="beginner">Beginner</option>
                  <option value="intermediate">Intermediate</option>
                  <option value="advanced">Advanced</option>
                </select>
              </div>
              <div class="mb-1 col-6">
                <label for="ser" class="form-label">Ser</label>
                <input 
                  type="text"
                  id="ser"
                  name="ser"
                  class="form-control"
                  value= "<?php echo $val['SER']; ?>"
                />
              </div>
              <div class="mb-1 col-6">
                <label for="nombres" class="form-label">Review</label>
                <select name="review" id="review" class="form-select"  >
                  <option selected value= "<?php echo $val['REVIEW']; ?>"><?php echo $val['REVIEW']; ?></option>
                  <option value="exelente">Exelente</option>
                  <option value="bueno">Bueno</option>
                  <option value="malo">Malo</option>
                  <option value="pesimo">Pesimo</option>
                </select>
              </div>
              <div class="mb-1 col-12">
                <label for="especialidad" class="form-label">Especialidad</label>
                <select name="especialidad" id="especialidad" class="form-select">
                  <option selected value= "<?php echo $val['ESPECIALIDAD']; ?>"><?php echo $val['ESPECIALIDAD']; ?>-Stack</option>
                  <option value="full">Full-Stack</option>
                  <option value="front">Front-Stack</option>
                  <option value="back">Back-Stack</option>
                </select>
              </div>

                <div class=" col-12 m-2">
                    <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
                </div>
                
                </form>
            <div id="charts1" class="charts"> </div>
        </div>
        </div>

        <div class="parte-derecho " id="detalles">
        <h3>Detalle Estudiantes</h3>
        <p>Cargando...</p>
        <!-- ///////Generando la grafica -->

        </div>

    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>