<?php

use Classes\Customer;

    require_once './init.php';
    
    //add customer
    if(isset($_POST['bt_add']))
    {
        $name = testInput($_POST['name']);
        $address = testInput($_POST['address']);
        $email = testInput($_POST['email']);
        $phone = testInput($_POST['phone']);

        $customer = new Customer();
        $customer->name = $name;
        $customer->address = $address;
        $customer->email = $email;
        $customer->phone = $phone;
        
        if($customer->add())
        {
            $_SESSION['success'] = 'New customer added successfully';
        }  
        else{
            $_SESSION['error'] = 'Error: Something went wrong';
        }
    }

    //update customer
    if(isset($_POST['bt_update']))
    {
        
        $id = testInput($_POST['id']);
        $name = testInput($_POST['name']);
        $address = testInput($_POST['address']);
        $email = testInput($_POST['email']);
        $phone = testInput($_POST['phone']);


        $customer = new Customer();
        $customer->id = $id;
        $customer->name = $name;
        $customer->address = $address;
        $customer->email = $email;
        $customer->phone = $phone;
        
        if($customer->update())
        {
            $_SESSION['success'] = 'Customer updated successfully';
        }  
        else{
            $_SESSION['error'] = 'Error: Something went wrong';
        }
    }


     //Delete customer
     if(isset($_POST['bt_delete']))
     {
         $id = testInput($_POST['id']);
        
         $customer = new Customer();
         $customer->id = $id;
         
         if($customer->delete())
         {
             $_SESSION['success'] = 'Customer deleted';
         }  
         else{
             $_SESSION['error'] = 'Error: Something went wrong';
         }
     }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer CRUD</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="page-wrapper">
        <header>
            <h1>
                <a href="" class="logo">Clientes CRUD</a>
            </h1>
        </header>

        <main class="main">

            <section class="list-display">
              <div class="container">
              <p class="success">
            <?php
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                }
            ?>
        </p>

        <p class="error">
            <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
        </p>

                <div class="header2">
                <button class="add-btn btn-none add-modal" id="open">Agregar Nuevo &plus;</button>
                </div>
                    <h2>Lista de clientes</h2>
                    <div class="table-list">
                        <?php
                        $customer = new Customer();
                        if(!empty($customer->all()))
                        {
                            echo '<table>';
                            echo '<tr class="tr"> <th>Id</th> <th>Nombre</th><th>Direccion</th><th>Email</th><th>Phone</th><th colspan="2">Action</th> </tr>';
                            foreach($customer->all() as $customer)
                            {
                                echo '<tr class="tr">';
                                 echo "<td id='id' class='td'>".$customer['id']."</td>";
                                 echo "<td id='name' class='td'>".$customer['name']."</td>";
                                 echo "<td id='address' class='td'>".$customer['address']."</td>";
                                 echo "<td id='email' class='td'>".$customer['email']."</td>";
                                 echo "<td id='phone' class='td'>".$customer['phone']."</td>";
                                 echo "<td> <a href='#' id='edit' class='link edit-link'>Edit</a> </td>". 
                                      "<td> <a href='#' id='delete' class='link delete-link'>Delete</a> </td>";
                                echo '</tr>';
                            }
                            echo '</table>';
                        }
                        else{
                            echo '<h3> No hay Clientes</h3>';
                        }
                        ?>
                    </div>
              </div>
            </section>



            <div class="modal" id="mymodal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="modal-close">&times;</span>
                    </div>
                    <section class="add-section">
                        <div class="add-container">
                            <div class="form form-add">
                                <h2 class="form-title">Agregar nuevo cliente</h2>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="form-add">
                                    <input type="hidden" name="id" id="id" class="input">
                                    <input type="text" class="input" name="name" id="name" placeholder="Nombre" required>*
                                    <input type="text" class="input"  name="address" id="address" placeholder="Direccion" required>*
                                    <input type="email" class="input" name="email" id="email" placeholder="Email" required>*
                                    <input type="number" class="input" name="phone" id="phone" placeholder="Phone">
                                    <button class="btn btn-primary submit" name="bt_add" type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>


        </main>
    </div>

    <script src="index.js"></script>
</body>
</html>
