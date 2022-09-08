<?php 
                $xcon = new GetConnection();
                $xconn = $xcon->getConnect();
                $result = $xconn->query("SELECT * FROM states");
                echo '<select name="state" 
                style="
                width: 20%;
                text-align: right;
                border: 1px solid #ddd;
                background: #e7e4e4;
                padding: 3px;
                border-radius: 3px;
                display: block;
                margin-bottom: 10px;
            "
                >';
                if( $result->num_rows > 0){
                    while(($row = $result->fetch_assoc()) != null){
                        echo '<option  value= "'. $row["id"]. '">' . $row["name"] . "</option>";
                    }
                }
                echo '</select>';
             ?>