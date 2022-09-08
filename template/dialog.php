 <!-- Html Hidden Form -->
 <div class="show">
     <!-- Form Show Data -->
     <div class="show-data">
         <style>
             .field {
                 display: block;
                 background-color: #e7e4e4;
                 border: none;
                 padding: 10px 5px;
                 width: 23%;
                 border-radius: 4px;
                 border: 1px solid #ddd;
                 margin: 8px auto;
             }
         </style>

         <form action="regions.php" method="post" enctype="multipart/form-data">
             <input type="text" name="name" id="name" class="field">
             <input type="file" name="imageF" id="image" class="field">
             <textarea name="content" id="" cols="30" rows="10" class="field"></textarea>
             <select name="type" id="" style="
                    width: 20%;
                    text-align: right;
                    border: 1px solid #ddd;
                    background: #e7e4e4;
                    padding: 3px;
                    border-radius: 3px;
                    display: block;
                    margin-bottom: 10px;
                ">
                 <option value="as">سياحية</option>
                 <option value="ay">أثرية</option>
             </select>
             <?php include "options.php" ?>
             <input type="submit" class="btn btn-blue" value="إضافة" style="
                    display: block;
                    width: 100px;
                    margin-bottom: 10px;
                ">
         </form>
     </div>
     <!-- Form Edit Data -->

 </div>