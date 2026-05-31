<!DOCTYPE html>
<html>

<head>

    <title>Agregar Producto</title>
       <a href="../home.php">

    <button>

        Inicio

    </button>

</a>

</head>

<body>

    <h1>Agregar Producto</h1>

    <form
    action="/gnc-system/controllers/ProductController.php"
    method="POST"
    enctype="multipart/form-data">

        <label>Categoría:</label>
        <br>

        <select name="category_id">

            <option value="1">Proteínas</option>

            <option value="2">Creatinas</option>

            <option value="3">Pre-entrenos</option>

            <option value="4">Vitaminas</option>

        </select>

        <br><br>

        <label>Nombre:</label>
        <br>

        <input type="text" name="name">

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="description"></textarea>

        <br><br>

        <label>Precio:</label>
        <br>

        <input type="number" name="price">

        <br><br>

        <label>Stock:</label>
        <br>

        <input type="number" name="stock">

        <br><br>

        <label>Imagen:</label>
        <br>

        <input type="file" name="image">

        <br><br>

        <button type="submit">

            Guardar Producto

        </button>

    </form>

</body>

</html>