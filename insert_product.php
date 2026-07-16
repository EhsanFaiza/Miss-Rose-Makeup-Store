<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
      <!-- Bootstrap CSS Link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous"> 

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
          integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS File -->
    <link rel="stylesheet" href="../style.css">   
</head>
<body class="bg light">
    <div class="container">
        <h1 class="text-center">Insert Products</h1>
        <!-- form-->
         <form action=""method="post" enctype="multipart/form-data">
            <!-- title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">
                    product title</label>
                    <input type="text" name="product_title" id="product_title"class ="form-control" 
                    placeholder="Enter product title">
    </div>
                    <!-- description-->
                    <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">
                    product description</label>
                    <input type="text" name="product_description" id="Description"class ="form-control" 
                    placeholder="Enter product description">
     </div>
     
     <!--categories-->
     <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="category" class="form-select">
                <option value="">select a category</option> 
                    <option value="">Face</option>
                    <option value="">Eyes</option>
                    <option value="">Lips</option>
            
                </select>
</div>
                  <!--price-->
     <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">
                    product price</label>
                    <input type="text" name="price" id="Price"class ="form-control" 
                    placeholder="Enter product price">
     
     </div>
          <!--price-->
          <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3   px-3"
                 value="insert products ">
</div>
         </form>
    </div>
    
</body>
</html>