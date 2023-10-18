<nav>
            <ul>
                <li>
                    <a href="#" class ="account">Account</a>
                    <ul class="dropdown">
                        <li><a href="#" onclick="openAdd()">Add</a></li>
                        <li><a href="#" onclick="openEdit()">Edit</a></li>
                        <li><a href="#" onclick="openDelete()">Delete</a></li>
                    </ul>
                </li>
            </ul>
        </nav>



         <!-----Add Propmpt------->
    <div class="popup" id="popup">
        <form class="insert_form" id="insert_form" method="post" action="" onsubmit="return validateForm();">

            <h2>ADD ACCOUNTS</h2> 
            <div class="accounttype">
                <label>Account Type:</label>
                <select name="account_Type[]" class="dropdownaccountType" id="accountTypeSelect"> 
                    <option value="">Select Account Type</option>
                    <option value="End User">End User</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="User Manager">User Manager</option>
                </select>
            </div>
            <div class="accountname">
                <label>Name:</label>
                <input type="text" name="account_Name[]" placeholder="Full Name" required><br>
            </div>
            <div class="userposition">
                <label>Position:</label>
                <input type="text" name="user_Position[]" required><br>
            </div>
            <div class="useroffice">
                <label>Office:</label>
                <select name="user_Office[]" class="dropdownuserOffice" id="userOfficeSelect"> 
                    <option value="">Select Office</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Assistant Schools Division Superintendent">Assistant Schools Division Superintendent</option>
                    <option value="BAC">BAC</option>
                    <option value="Budget">Budget</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Commission on Audit">Commission on Audit</option>
                    <option value="Curriculum Implementation Division">Curriculum Implementation Division</option>
                    <option value="General Services">General Services</option>
                    <option value="Information Communications Technology">Information Communications Technology</option>
                    <option value="Legal">Legal</option>
                    <option value="Payroll">Payroll</option>
                    <option value="Personnel">Personnel</option>
                    <option value="Property and Supply">Property and Supply</option>
                    <option value="Records">Records</option>
                    <option value="Schools Division Superintendent">Schools Division Superintendent</option>
                    <option value="School Governance Operations Division">School Governance Operations Division</option>
                </select>
            </div>
            <div class="centercode">
                <label>Center Code:</label>
                <input type="text" name="center_Code[]" required>
            </div>
            <div class="depedemail">
                <label>Deped Email:</label>
                <input type="email" placeholder="example@deped.gov.ph" name="deped_Email[]" id="depedEmailInput" required pattern=".+@deped\.gov\.ph$">
            </div>
            <script>
    
            </script>
            <div class="accountpass">
                <label>Password:</label>
                <input type="text" name="account_Pass[]" required>
            </div>

            <div class="buttons">
                <input class="Register" type="submit" name="register" id="register" value="Register">
                <button type="button" class="Close" onclick="closeAdd()">Close</button>    
            </div>
        
        </form> 
    </div>
    <!-----Add Propmpt END------->



    <!-----Edit Prompt------->              
    <div class="popup2" id="popup2">
        <form method="POST" action="edit_account.php">
            <h2>EDIT ACCOUNT</h2>
            <?php //To connect Dropdown to database
                $sql = "SELECT depedEmail FROM ris_accounts ORDER BY depedEmail ASC";
                $result = $conn->query($sql);
            ?>
            <select name="selected_email" id="selectedEmail" class="dropdownedit"> 
                <?php //Dropdownlist
             
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['depedEmail'] . "'>" . $row['depedEmail'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
            
                ?>
            </select>

            <div class="User_Office">
                <label for="useroffice">Office:</label>
                <input type="text" name="useroffice" id="userOffice" required>
            </div>
            <div class="User_Position">
                <label>Position:</label>
                <input type="text" name="userposition" id="userPosition" required>
            </div>
            <div class="Center_Code">
                <label>Center Code:</label>
                <input type="text" name="centercode" id="centerCode" required>
            </div>
            <div class="buttons2">
                <button type="submit" class="Save2">Save</button>
                <button type="button" class="Close2" onclick="closeEdit()">Close</button>
            </div>
        </form>
    </div>

    <!-----Edit Prompt------->



    <!-----Delete Prompt------->
    <div class="popup3" id="popup3">
        <form method="POST" action="delete_account.php">
            <h2>DELETE INVENTORY</h2>
            <?php //To connect Dropdownlist to database
                $sql = "SELECT depedEmail FROM ris_accounts ORDER BY depedEmail ASC";
                $result = $conn->query($sql);
                ?>

                <select name="selected_item_delete" class="dropdowndelete"> 
                    <?php //Dropdownlist Delete
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['depedEmail'] . "'>" . $row['depedEmail'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
                    ?>
                </select>
                <div class="buttons3">
                    <button type="submit" class="Delete" name="delete_account">DELETE</button>
                    <button type="button" class="Close3" onclick="closeDelete()">Close</button>
                </div>
        </form>   
    </div>
    <!-----Delete Prompt------->