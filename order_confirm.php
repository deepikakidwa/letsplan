    <?php
    // if(!isset($_SESSION['login_token'])) {
          // header('Location: index.php');
          // exit();
      // } 
    include('header.php');

    ?>
            <div class="step-nav">
                <div class="container">
                    <div class="inner-nav">	
                        <ul>
                            <li class="first"><a href="mycart.php"><span class="number">1</span><span class="text">Cart Summary</span></a></li>
    						<li style="margin-right:70px"><a href="address.php"><span class="number" >2</span><span class="text">Address Details</span></a></li>
                            <li style="margin-left:70px"><a href="Product_Details.php"><span class="number">3</span><span class="text">Payment Details</span></a></li>
                            <li class="last active "><a href="order.php"><span class="number">4</span><span class="text">Order Confirm</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="#">Home</a>/</li>
                        <li><a href="#">Event Organizers</a>/</li>
                        <li class="active"><a href="#">Order Confirm</a></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="bookin-info">
                        <div class="bookin-infoRow">
                            <div class="bookin-id">Booking ID : <span> 1196760272</span></div>
                            <div class="date">31 Aug ‘ 15     4:20 pm</div>
                        </div>
                        <div class="thanks-msg">
                            <div class="icon icon-right-sign"></div>
                            <h3>Thank you for your payment</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <table class="bookin-table">
                            <tr>
                                <th colspan="6" class="table-heading">Leipzig Marriott Hotel <a href="#" class="icon icon-delete"></a></th>
                            </tr>
                            <tr>
                                <td class="first Theading">Address</td>
                                <td class="Theading">Booking Date</td>
                                <td class="Theading">Meal Plans</td>
                                <td class="Theading">Price Range</td>
                                <td class="Theading">Max Guest</td>
                                <td class="Theading last">Min. Booking Amount to Pay</td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <label>Address</label>
                                    <p>Am Hallischen Tor 1 Saxony Leipzig, 04109 - Germany</p>
                                </td>
                                <td>
                                    <label>Booking Date</label>
                                    <p>29<sup>th</sup> Nov 2015</p>
                                </td>
                                <td>
                                    <label>Meal Plans</label>
                                    <p>Breakfast</p>
                                </td>
                                <td>
                                    <label>Price Range</label>
                                    <p>$ 1000 <small>(Onwards)</small></p>
                                </td>
                                <td>
                                    <label>Max Guest</label>
                                    <p>500 <a href="#" class="icon icon-edit"></a></p>
                                    
                                </td>
                                <td class="last">
                                    <label>Min. Booking Amount to Pay</label>
                                    <p>$  5,000 (Onwards)</p>
                                </td>
                            </tr>
                        </table>
                        <table class="bookin-table">
                            <tr>
                                <th colspan="6" class="table-heading">Hotel AMANO Grand Central <a href="#" class="icon icon-delete"></a></th>
                            </tr>
                            <tr>
                                <td class="first Theading">Address</td>
                                <td class="Theading">Booking Date</td>
                                <td class="Theading">Meal Plans</td>
                                <td class="Theading">Price Range</td>
                                <td class="Theading">Max Guest</td>
                                <td class="Theading last">Min. Booking Amount to Pay</td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <label>Address</label>
                                    <p>Heidestrasse 62 Berlin, 10557 - Germany</p>
                                </td>
                                <td>
                                    <label>Booking Date</label>
                                    <p>29<sup>th</sup> Nov 2015</p>
                                </td>
                                <td>
                                    <label>Meal Plans</label>
                                    <p>Lunch</p>
                                </td>
                                <td>
                                    <label>Price Range</label>
                                    <p>$ 1200 <small>(Onwards)</small></p>
                                </td>
                                <td>
                                    <label>Max Guest</label>
                                    <p>300 <a href="#" class="icon icon-edit"></a></p>
                                    
                                </td>
                                <td class="last">
                                    <label>Min. Booking Amount to Pay</label>
                                    <p>$ 8,000 (Onwards)</p>
                                </td>
                            </tr>
                        </table>
                        <table class="bookinTotal">
                            <tr>
                                <td class="subTotal">Subtotal</td>
                                <td class="amount subTotal">$ 13,000</td>
                            </tr>
                            <tr>
                                <td >Min. Booking Amount to pay</td>
                                <td class="amount">$ 13,000</td>
                            </tr>
                        </table>
                        <div class="bookinRow">
                            <div class="input-box">
                                <label>Your Name :</label>
                                <input type="text" placeholder="User name">
                            </div>
                            <div class="input-box">
                                <label>Email ID :</label>
                                <input type="text" placeholder="User@yahoo.com">
                            </div>
                            <div class="input-box">
                                <label>Phone :</label>
                                <input type="text" placeholder="1234568970">
                            </div>
                            <a href="#" class="btn">Cancel Booking</a>
                        </div>
                        <div class="note">
                            <div class="inner-block">
                                <div class="icon icon-info"></div>
                                <label>Important Information</label>
                                <p>Please carry any valid photo id proof at the venue</p>
                            </div>
                        </div>
                        <div class="contact-info">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of Contact <a href="mailTo:info@eventplanning.com">info@eventplanning.com</a></div>
                        <div class="bottom-blcok">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon icon-assurance"></div>
                                    <span>100% Assurance</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummybook</p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="icon icon-trust"></div>
                                    <span>Trust</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummybook</p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="icon icon-promise"></div>
                                    <span>Our Promise</span>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummybook</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php include('footer.php');?>