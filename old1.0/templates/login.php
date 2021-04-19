<div class='container-fluid d-flex'>
                    <div class='container align-self-center pt-5 text-center'>
                        <div class='container align-self-center'>
                        <p class='profiletext' style='font-size:40px;'>Login</p>
                            <form action='user/login.php' method='post'>
                                <p class='profiletext'>Username</p>
                                <input type='text' name='username' id=''>
                                <br><br>
                            
                                <p class='profiletext'>Password</p>
                                <input type='password' name='password' id='pswd' placeholder=''>
                                <br><br>
                            
                                <p class='profiletext' style='color: red; display:block;' id='error'>
                    <?php
                    if ($_GET["error"] == "y") {
                        echo "Error. Try Again.";
                    }
                    ?>
                                </p>
                                <input type='submit' name='submit'  value='Confirm' id='submit'/>
                                <br>
                                <br>
                                <p>.</p>
                            </form>
                        </div>
                    </div>
                </div>