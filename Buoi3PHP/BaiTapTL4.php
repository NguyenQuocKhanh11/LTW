<!DOCTYPE html>
<html>
    <head>
        <style>
            .error {color: #FF0000;}
            .g-grid {
                display: grid;
                grid-template-columns: calc(50% - (30px * 1/2)) calc(50% - (30px * 1/2));
                grid-column-gap: 30px;
            }

            .g-grid-col {
                padding: 30px;
                background-color: red;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="g-grid">
                <div class="g-grid-col">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="firstName" value="<?php echo $firstName;?>">
                        <span class="error">* <?php echo $firstNameErr;?></span>
                        <br><br>
                        <input type="text" name="lastName" value="<?php echo $lastName;?>">
                        <span class="error">* <?php echo $lastNameErr;?></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email;?>">
                        <span class="error">* <?php echo $emailErr;?></span>
                    </div>
                </div>
                <div class="g-grid-col">
                    <div class="form-group">
                        <label>Invoice ID</label>
                        <input type="text" name="invoiceId" value="<?php echo $invoiceId;?>">
                        <span class="error">* <?php echo $invoiceIdErr;?></span>
                    </div>
                </div>
            </div>

            <div class="g-grid">
                <div class="g-grid-col">
                    <div class="form-group">
                        <label>Pay For</label><br>
                        <input type="checkbox" name="payFor[]" value="15K Category" <?php if(in_array("15K Category", $payFor)) echo "checked";?>> 15K Category<br>
                        <input type="checkbox" name="payFor[]" value="35K Category" <?php if(in_array("35K Category", $payFor)) echo "checked";?>> 35K Category<br>
                        <input type="checkbox" name="payFor[]" value="55K Category" <?php if(in_array("55K Category", $payFor)) echo "checked";?>> 55K Category<br>
                        <input type="checkbox" name="payFor[]" value="75K Category" <?php if(in_array("75K Category", $payFor)) echo "checked";?>> 75K Category<br>
                        <input type="checkbox" name="payFor[]" value="116K Category" <?php if(in_array("116K Category", $payFor)) echo "checked";?>> 116K Category<br>
                        <input type="checkbox" name="payFor[]" value="Shuttle One Way" <?php if(in_array("Shuttle One Way", $payFor)) echo "checked";?>> Shuttle One Way<br>
                    </div>
                </div>
                <div class="g-grid-col">
                    <div class="form-group">
                        <input type="checkbox" name="payFor[]" value="Shuttle Two Ways" <?php if(in_array("Shuttle Two Ways", $payFor)) echo "checked";?>> Shuttle Two Ways<br>
                        <input type="checkbox" name="payFor[]" value="Compressport T-Shirt Merchandise" <?php if(in_array("Compressport T-Shirt Merchandise", $payFor)) echo "checked";?>> Compressport T-Shirt Merchandise<br>
                        <input type="checkbox" name="payFor[]" value="Training Cap Merchandise" <?php if(in_array("Training Cap Merchandise", $payFor)) echo "checked";?>> Training Cap Merchandise<br>
                        <input type="checkbox" name="payFor[]" value="Buf Merchandise" <?php if(in_array("Buf Merchandise", $payFor)) echo "checked";?>> Buf Merchandise<br>
                        <input type="checkbox" name="payFor[]" value="Other" <?php if(in_array("Other", $payFor)) echo "checked";?>> Other<br>
                        <span class="error">* <?php echo $payForErr;?></span>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="Submit">  
        </form>
    </body>
</html>
