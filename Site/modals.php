	<link href="css/modal_styling.css" rel="stylesheet" media="screen">
  <!-- Modal Login-->

  <div class="modal fade" id="LoginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-11">
              <h4 class="modal-title">Tokkel in Vorm</h4>
              </div>
              <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" id="closex">&times;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="input-group">
              <span class="input-group-addon">Gebruikers Naam:</span>
              <input class="form-control" id="user" type="text" name="username" placeholder="Gebruikers Naam">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Wagwoord:</span>
              <input class="form-control" id="pswd1" type="password" name="password" placeholder="Wagwoord">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="loginsubmit" type="submit" class="btn btn-default" onclick="Login_Register('Login')">Tokkel in</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
        </div>
      </div>
      
    </div>
  </div> 

  <!-- Clear modal when closed-->
  <script type="text/javascript">
    
    $('#LoginModal').on('hidden.bs.modal', function () {
      $(this)
        .find("input,textarea,select")
          .val('')
          .end()
    });

  </script>
  <!--_______________________________________________________________________________________________________________-->
  <!-- Register -->
  <!-- User -->
  <div class="modal fade" id="RegisterModal-User" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-11">
              <h4 class="modal-title">Registrasievorm : Gebruiker</h4>
              </div>
              <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" id="closex">&times;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="input-group">
              <span class="input-group-addon">Noemnaam:</span>
              <input class="form-control" id="fnameu" type="text" name="firstname" placeholder="Noemnaam">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Van:</span>
              <input class="form-control" id="lnameu" type="text" name="lastname" placeholder="Van">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Wagwoord:</span>
              <input class="form-control" id="pswd2" type="password" name="password" placeholder="Wagwoord">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="registersubmit" type="submit" class="btn btn-default" onclick="Login_Register('User')">Registeer</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
        </div>
      </div>
      
    </div>
  </div> 

  <!-- Clear Modal when Closed -->
  <script type="text/javascript">
    
    $('#RegisterModal-User').on('hidden.bs.modal', function () {
      $('.modal-body').find('textarea,input').val('');
    });
    
  </script>

  <!-- Shop keeper -->

  <div class="modal fade" id="RegisterModal-ShopKeeper" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-11">
              <h4 class="modal-title">RRegistrasievorm : Winkeleienaar</h4>
              </div>
              <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" id="closex">&times;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="input-group">
              <span class="input-group-addon">Noemnaam:</span>
              <input class="form-control" id="fnames" type="text" name="firstname" placeholder="Noemnaam">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Van:</span>
              <input class="form-control" id="lnames" type="text" name="lastname" placeholder="Van">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Mobilifoon:</span>
              <input class="form-control" id="nums" type="text" name="number" placeholder="0121234567">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Geboortedatum:</span>
              <input class="form-control" id="dates" type="date" name="date" placeholder="DD/MM/JJJJ">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Winkel Naam:</span>
              <input class="form-control" id="shpname" type="text" name="shopname" placeholder="Winkel Naam">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Wagwoord:</span>
              <input class="form-control" id="pswd3" type="password" name="password" placeholder="Wagwoord">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="registersubmit" type="submit" class="btn btn-default" onclick="Login_Register('Shop')">Registeer</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
        </div>
      </div>
      
    </div>
  </div> 
  <!-- Clear Modal when Closed -->
  <script type="text/javascript">
    
    $('#RegisterModal-ShopKeeper').on('hidden.bs.modal', function () {
      $('.modal-body').find('textarea,input').val('');
    });

  </script>
  <!--_______________________________________________________________________________________________________________-->

  <!-- Add item modal-->

  <div class="modal fade" id="ItemAddModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-11">
              <h4 class="modal-title">Voeg item by</h4>
              </div>
              <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" id="closex">&times;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="input-group">
              <span class="input-group-addon">Produk Naam:</span>
              <input class="form-control" id="productname" type="text" name="prodname" placeholder="Product Name">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Produk Prys:</span>
              <input class="form-control" id="productprice" type="number" name="prodprice">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Hoeveel beskikbaar:</span>
              <input class="form-control" id="productquant" type="number" name="prodquant">
            </div>
            <div class="input-group">
              <span class="input-group-addon">Kategorieë:</span>
                <select class="form-control" id="prodcategory">
                <option>Elektronika</option>
                <option>Tweedehanse Praktikums</option>
                <option>Tweedehanse handboeke (Skaars gebruik)</option>
                <option>Slawerny</option>
                <option>Allerly</option>
              </select>
            </div>  
            
          </div>
        </div>
        <div class="modal-footer">
          <button id="loginsubmit" type="submit" class="btn btn-default" onclick="addItem()">Indien</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
        </div>
      </div>
      
    </div>
  </div> 

  <!-- Clear modal when closed-->
  <script type="text/javascript">
    
    $('#ItemAddModal').on('hidden.bs.modal', function () {
      $(this)
        .find("input,textarea,select")
          .val('')
          .end()
      document.getElementById("uploadinput").value = "Upload";
    });

  </script>


    <div class="modal fade" id="ItemImgAddModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-11">
              <h4 class="modal-title">Voeg prent van item by</h4>
              </div>
              <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" id="closex">&times;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
           
              <!--<span class="input-group-addon">Foto oplaai opsie</span>-->
              <form action="upload.php" method="post" enctype="multipart/form-data"> 
                 <div class="input-group">
                  <span class="input-group-addon">Produk Naam:</span>
                  <input class="form-control" type="text" name="productname2" placeholder="Product Name">
                </div>
                <input type="file" name="uploadedimg" hidden id="imgu pload" style="background-color: white">
                <input type="submit" value="Upload" id="uploadinput">
              </form>
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
        </div>
      </div>
      
    </div>
  </div> 

  
  <!--_______________________________________________________________________________________________________________-->

    <!-- Remove item modal-->

  <div class="modal fade" id="ItemRemoveModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-11">
              <h4 class="modal-title">Verwyder Item</h4>
              </div>
              <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" id="closex">&times;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="container-fluid">

            <div class="input-group">
              <span class="input-group-addon">Produk Naam:</span>
              <input class="form-control" id="productname2" type="text" name="productname" placeholder="Product Name">
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button id="loginsubmit" type="submit" class="btn btn-default" onclick="deleteItem()">Indien</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Sluit</button>
        </div>
      </div>
      
    </div>
  </div> 

  <!-- Clear modal when closed-->
  <script type="text/javascript">
    
    $('#ItemRemoveModal').on('hidden.bs.modal', function () {
      $(this)
        .find("input,textarea,select")
          .val('')
          .end()
    });

  </script>
  <!--_______________________________________________________________________________________________________________-->

    <!-- Modal Login-->

  <div class="modal fade" id="CheckoutModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-11">
              <h4 class="modal-title">Kas uit.</h4>
              </div>
              <div class="col-sm-1">
              <button type="button" class="close" data-dismiss="modal" id="closex">&times;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="input-group">
              <span class="input-group-addon" id="cost">Totale Koste: Onder Berekening</span>
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="numitems">Hoeveelheid Items: Onder Berekening</span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="loginsubmit" type="submit" class="btn btn-default pull-left" onclick="checkoutStart()">Bereken Rekening</button>
          <button id="loginsubmit" type="submit" class="btn btn-default" onclick="setTimeout(checkoutFinish, 3000);">Betaal</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Kanseleer</button>
        </div>
      </div>
      
    </div>
  </div>

  <script type="text/javascript">
    
    $('#CheckoutModal').on('hidden.bs.modal', function () {
      document.getElementById("cost").innerHTML     = "U kosted beloop R (Onder Berekening)"
      document.getElementById("numitems").innerHTML = "Totale Items gekoop is, (Onder Berekening)" ;
    });

  </script>

  