<?php

/** @var $params \app\models\RegistrationModel
 */

?>
<div class="card card-plain mt-8">
    <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-info text-gradient"> Registration</h3>
        <p class="mb-0">Enter your email and password to sign up</p>
    </div>
    <div class="card-body">
        <form action="/registrationProcess" method="post" role="form">
            <label>Email</label>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                <?php
                    if ($params !== null && $params->errors !== null)
                    {
                        foreach ($params->errors as $objectNum => $item) {
                            if ($objectNum == "email")
                            {
                                echo "<span class='text-danger'>$item[0]</span>";
                            }
                        }
                    }
                ?>
            </div>
            
            <label>Password</label>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                <?php
                    if ($params !== null && $params->errors !== null)
                    {
                        foreach ($params->errors as $objectNum => $item) {
                            if ($objectNum == "password")
                            {
                                echo "<span class='text-danger'>$item[0]</span>";
                            }
                        }
                    }
                ?>
            </div>
            <label>Your age</label>
            <div class="mb-3">
                <input type="number" class="form-control" name="age" placeholder="age" aria-label="age" aria-describedby="age-addon">
               
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign Up</button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto">
            Already registered?
            <a href="/login" class="text-info text-gradient font-weight-bold">Sign in</a>
        </p>
    </div>
</div>