<?php //Template Name: Ticket Template ?>
<?php get_header() ?>
<div class="required">
    <div class="container">
        <div class=" col-md-offset-3 col-md-6">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" class="btn btn-primary btn-circle none-click step1">1</a>
                        <span class="btn btn-primary btn-circle none-click step1" style="display: none;">1</span>

                        <p>Order Started</p>
                    </div>
                    <div class="stepwizard-step">
                        <!-- <a href="#step-2" class="btn btn-default btn-circle none-click step2">2</a> -->
                        <a href="#step-2" class="btn btn-default btn-circle none-click step2"
                           style="display: none;">2</a>
                        <span class="btn btn-default btn-circle none-click step2">2</span>

                        <p>Create Your Ticket</p>
                    </div>
                    <div class="stepwizard-step">
                        <!-- <a href="#step-3" class="btn btn-default btn-circle none-click step3">3</a> -->
                        <a href="#step-3" class="btn btn-default btn-circle none-click step3"
                           style="display: none;">3</a>
                        <span class="btn btn-default btn-circle none-click step3">3</span>

                        <p>Finished</p>
                    </div>
                </div>
                <img class="bacha" src="<?php echo ot_get_option('ticket_cartoon') ?>" alt="">
            </div>
        </div>

        <!-- id="form-validate" -->
        <form id="" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" class="form-horizontal">
            <?php wp_nonce_field('createTicket', 'security-code-here'); ?>
            <input name="action" value="createTicket" type="hidden">

            <div class="row setup-content" id="step-1" parsley-validate parsley-bind>
                <div class="clearfix shipping col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="container">
                            <div style="margin:0px;" class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ticket-contity">
                                    <div class="created clearfix">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group form-feild">
                                                <label class="col-sm-6 control-label control-1"
                                                       for="textinput"><span>*</span>Ticket Quantity:
                                                </label>

                                                <div class="col-sm-6">
                                                    <?php $quantity_rate = get_field('quantity_rate', get_the_ID()) ?>
                                                    <?php if ($quantity_rate) : ?>

                                                        <select name="quantity" data-required="quantity"
                                                                class="form-control form-input-area marginTop6"
                                                                required>

                                                            <?php foreach ($quantity_rate as $q_r): ?>
                                                                <?php if ($q_r['rate'] != 'Please Contact Us'): ?>
                                                                    <option <?php echo (isset($_GET['quantity']) && $_GET['quantity'] == $q_r['quantity']) ? 'selected' : null ?>
                                                                        value="<?php echo $q_r['quantity'] . '-' . $q_r['rate'] . '-' . $q_r['weight'] ?>"><?php echo $q_r['quantity'] . ' for ' . ot_get_option('currency') . $q_r['rate'] ?></option>
                                                                <?php else: ?>
                                                                    <option
                                                                        value="<?php echo $q_r['quantity'] . '-' . $q_r['weight'] ?>">
                                                                        Over
                                                                        - <?php echo $q_r['quantity'] . ' ' . $q_r['rate'] ?></option>
                                                                <?php endif ?>
                                                            <?php endforeach;
                                                            wp_reset_postdata(); ?>

                                                        </select>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group form-feild">
                                                <label class="col-sm-3 control-label control-1" for="textinput">Ticket
                                                    Style:</label>

                                                <div class="col-sm-9">
                                                    <p class="pull-left asim-1">

                                                        <label class="radio-inline">
                                                            <input type="radio" data-required="style"
                                                                   class="ticket-stub" name="style" checked="checked"
                                                                   value="Stub"> Stub
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" data-required="style" name="style"
                                                                   class="ticket-stub" value="No Stub"> No Stub
                                                        </label>
                                                        <!--
                                                                                              <input type="radio" name="style" value="" placeholder="">
                                                                                          &nbsp;&nbsp;Stub</p>
                                                                                          <p class="pull-left asim-1">&nbsp;&nbsp;<input type="radio" name="" value="" required placeholder="">&nbsp;&nbsp;No Stub</p> -->
                                                </div>
                                            </div>
                                        </div>

                                        <p class="text-center"> Orders for our standard Raffle Tickets received before
                                            10 a.m. (EST) business days are shipped via UPS ground the same day.
                                        </p>


                                    </div>
                                    <div class="ticket-color clearfix">
                                        <ul class="list-unstyled list-inline color-area">
                                            <li class="tc-li">
                                                <span class="tc-span">Ticket Color:</span></li>

                                            <li class="tc-label">
                                                <label class="radio-inline radio-popular">
                                                    <input type="radio" name="color" checked="checked"
                                                           class="radio-color yellow-color" value="#fff59a"
                                                           data-color="Yellow:fff59a"> <span
                                                        class="yellow">Yellow</span>

                                                    <p>Most Popular</p>
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" class="radio-color" name="color" value="#ffffff"
                                                           data-color="White:ffffff"> <span class="white">White</span>
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" class="radio-color" name="color" value="#e1f4fd"
                                                           data-color="Blue:e1f4fd"> <span class="blue">Blue</span>
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" class="radio-color" name="color" value="#e1ecd6"
                                                           data-color="Green:e1ecd6"> <span class="green">Green</span>
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" class="radio-color" name="color" value="#ffe2e2"
                                                           data-color="Pink:e1ecd6"> <span class="pink">Pink</span>
                                                </label>
                                            </li>

                                        </ul>
                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marginTop20">
                                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                                        <div class="head-area">
                                            <h1>Shipping & Contact</h1>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
                                        <div class="form-area">

                                            <div>
                                                <fieldset>

                                                    <!-- Text input-->
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-2 control-label" for="textinput"><span>*</span>First/<span>*</span>Last
                                                                Name:</label>

                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder=""
                                                                       data-required="fullname" autocomplete="off"
                                                                       name="fullname" required
                                                                       class="form-control form-input-area fullname-input step1-input">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Text input-->
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-2 control-label text-area-bar"
                                                                   for="textinput">Business Name:<p>Fill in ONLY if
                                                                    shipping to a commercial address</p></label>

                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder=""
                                                                       data-required="business_name"
                                                                       name="business_name" autocomplete="off"
                                                                       class="form-control form-input-area step1-input">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-5 control-label" for="textinput"><span>*</span>
                                                                Day Phone:</label>

                                                            <div class="col-sm-7">
                                                                <input type="text" placeholder="" name="day_phone"
                                                                       data-required="day_phone" autocomplete="off"
                                                                       class="form-control form-input-area phone1 step1-input"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-5 control-label" for="textinput"><span>*</span>
                                                                Cell / Alt Phone:</label>

                                                            <div class="col-sm-7">
                                                                <input type="text" placeholder="" autocomplete="off"
                                                                       data-required="phone_number" required
                                                                       name="phone_number"
                                                                       class="form-control form-input-area phone2 step1-input">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-2 control-label"
                                                                   for="textinput">Fax:</label>

                                                            <div class="col-sm-6">
                                                                <input type="number" placeholder="" name="fax"
                                                                       autocomplete="off" data-required="fax"
                                                                       class="form-control form-input-area">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-2 control-label" for="textinput"><span>*</span>
                                                                Email:</label>

                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="" name="email"
                                                                       autocomplete="off" data-required="email" required
                                                                       class="form-control form-input-area step1-input">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-2 control-label" for="textinput"><span>*</span>
                                                                Address 1:</label>

                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="" required
                                                                       name="address" autocomplete="off"
                                                                       data-required="address"
                                                                       class="form-control form-input-area step1-input">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-2 control-label" for="textinput">Address
                                                                2:</label>

                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="" name="address_2"
                                                                       autocomplete="off" data-required="address_2"
                                                                       class="form-control form-input-area">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-4 control-label" for="textinput"><span>*</span>
                                                                City:</label>

                                                            <div class="col-sm-7">
                                                                <input type="text" placeholder="" required name="city"
                                                                       data-required="city" autocomplete="off"
                                                                       class="form-control form-input-area step1-input">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-3 control-label" for="textinput"><span>*</span>
                                                                State:</label>


                                                            <div class="col-sm-9">

                                                                <select class="form-control form-input-area step1-input"
                                                                        data-required="state" name="state" required>
                                                                    <!-- <option value="">Select a State </option> -->
                                                                    <option value="AL">Alabama</option>
                                                                    <option value="AK">Alaska</option>
                                                                    <option value="AZ">Arizona</option>
                                                                    <option value="AR">Arkansas</option>
                                                                    <option value="CA">California</option>
                                                                    <option value="CO">Colorado</option>
                                                                    <option value="CT">Connecticut</option>
                                                                    <option value="DE">Delaware</option>
                                                                    <option value="FL">Florida</option>
                                                                    <option value="GA">Georgia</option>
                                                                    <option value="HI">Hawaii</option>
                                                                    <option value="ID">Idaho</option>
                                                                    <option value="IL">Illinois</option>
                                                                    <option value="IN">Indiana</option>
                                                                    <option value="IA">Iowa</option>
                                                                    <option value="KS">Kansas</option>
                                                                    <option value="KY">Kentucky</option>
                                                                    <option value="LA">Louisiana</option>
                                                                    <option value="ME">Maine</option>
                                                                    <option value="MD">Maryland</option>
                                                                    <option value="MA">Massachusetts</option>
                                                                    <option value="MI">Michigan</option>
                                                                    <option value="MN">Minnesota</option>
                                                                    <option value="MS">Mississippi</option>
                                                                    <option value="MO">Missouri</option>
                                                                    <option value="MT">Montana</option>
                                                                    <option value="NE">Nebraska</option>
                                                                    <option value="NV">Nevada</option>
                                                                    <option value="NH">New Hampshire</option>
                                                                    <option value="NJ">New Jersey</option>
                                                                    <option value="NM">New Mexico</option>
                                                                    <option value="NY">New York</option>
                                                                    <option value="NC">North Carolina</option>
                                                                    <option value="ND">North Dakota</option>
                                                                    <option value="OH">Ohio</option>
                                                                    <option value="OK">Oklahoma</option>
                                                                    <option value="OR">Oregon</option>
                                                                    <option value="PA">Pennsylvania</option>
                                                                    <option value="RI">Rhode Island</option>
                                                                    <option value="SC">South Carolina</option>
                                                                    <option value="SD">South Dakota</option>
                                                                    <option value="TN">Tennessee</option>
                                                                    <option value="TX">Texas</option>
                                                                    <option value="UT">Utah</option>
                                                                    <option value="VT">Vermont</option>
                                                                    <option value="VA">Virginia</option>
                                                                    <option value="WA">Washington</option>
                                                                    <option value="WV">West Virginia</option>
                                                                    <option value="WI">Wisconsin</option>
                                                                    <option value="WY">Wyoming</option>

                                                                </select>
                                                            </div>


                                                        </div>


                                                    </div>

                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-2 control-label" for="textinput"><span>*</span>Zip:</label>

                                                            <div class="col-sm-7">
                                                                <input type="text" maxlength="5" data-zipcode="0"
                                                                       data-required="zip_code" required name="zip_code"
                                                                       class="form-control form-input-area zipcode step1-input"
                                                                       pattern="[0-9]*" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                        <div class="form-group form-feild">
                                                            <label class="col-sm-3 control-label" for="textinput">Billing
                                                                same as shipping:</label>

                                                            <div class="col-sm-9">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="billing_as_shipping"
                                                                           checked="checked" value="yes"> Y
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="billing_as_shipping"
                                                                           value="no"> N
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>


                                                <div class="modal fade" id="billing-id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Billing Address</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-sm-12">

                                                                    <div class="form-group">
                                                                        <label for="ticket_c_billing">Enter your Billing
                                                                            Address.</label>
                                                                        <textarea name="ticket_c_billing" id="input"
                                                                                  autocomplete="off"
                                                                                  class="form-control form-input-area billing-address"
                                                                                  rows="3"
                                                                                  required="required"></textarea>
                                                                    </div>

                                                                </div>


                                                                <div class="col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="" for="textinput"><span>*</span>
                                                                            City:</label>
                                                                        <input type="text" placeholder="" required
                                                                               name="city_b" autocomplete="off"
                                                                               class="form-control form-input-area billing-address">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4">
                                                                    <div class="form-group">

                                                                        <label class="" for="textinput"><span>*</span>
                                                                            State:</label>

                                                                        <select
                                                                            class="form-control form-input-area billing-address"
                                                                            name="state_b" required>
                                                                            <!-- <option value="">Select a State </option> -->
                                                                            <option value="AL">Alabama</option>
                                                                            <option value="AK">Alaska</option>
                                                                            <option value="AZ">Arizona</option>
                                                                            <option value="AR">Arkansas</option>
                                                                            <option value="CA">California</option>
                                                                            <option value="CO">Colorado</option>
                                                                            <option value="CT">Connecticut</option>
                                                                            <option value="DE">Delaware</option>
                                                                            <option value="FL">Florida</option>
                                                                            <option value="GA">Georgia</option>
                                                                            <option value="HI">Hawaii</option>
                                                                            <option value="ID">Idaho</option>
                                                                            <option value="IL">Illinois</option>
                                                                            <option value="IN">Indiana</option>
                                                                            <option value="IA">Iowa</option>
                                                                            <option value="KS">Kansas</option>
                                                                            <option value="KY">Kentucky</option>
                                                                            <option value="LA">Louisiana</option>
                                                                            <option value="ME">Maine</option>
                                                                            <option value="MD">Maryland</option>
                                                                            <option value="MA">Massachusetts</option>
                                                                            <option value="MI">Michigan</option>
                                                                            <option value="MN">Minnesota</option>
                                                                            <option value="MS">Mississippi</option>
                                                                            <option value="MO">Missouri</option>
                                                                            <option value="MT">Montana</option>
                                                                            <option value="NE">Nebraska</option>
                                                                            <option value="NV">Nevada</option>
                                                                            <option value="NH">New Hampshire</option>
                                                                            <option value="NJ">New Jersey</option>
                                                                            <option value="NM">New Mexico</option>
                                                                            <option value="NY">New York</option>
                                                                            <option value="NC">North Carolina</option>
                                                                            <option value="ND">North Dakota</option>
                                                                            <option value="OH">Ohio</option>
                                                                            <option value="OK">Oklahoma</option>
                                                                            <option value="OR">Oregon</option>
                                                                            <option value="PA">Pennsylvania</option>
                                                                            <option value="RI">Rhode Island</option>
                                                                            <option value="SC">South Carolina</option>
                                                                            <option value="SD">South Dakota</option>
                                                                            <option value="TN">Tennessee</option>
                                                                            <option value="TX">Texas</option>
                                                                            <option value="UT">Utah</option>
                                                                            <option value="VT">Vermont</option>
                                                                            <option value="VA">Virginia</option>
                                                                            <option value="WA">Washington</option>
                                                                            <option value="WV">West Virginia</option>
                                                                            <option value="WI">Wisconsin</option>
                                                                            <option value="WY">Wyoming</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="" for="textinput"><span>*</span>
                                                                            Zip Code:</label>
                                                                        <input type="text" maxlength="5"
                                                                               data-zipcode="0" required
                                                                               name="zip_code_b"
                                                                               class="form-control form-input-area zipcode_b billing-address"
                                                                               pattern="[0-9]*" autocomplete="off">
                                                                    </div>

                                                                </div>
                                                                <div class="clearfix">&nbsp;</div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                        class="btn btn-primary btn-save-billing">Save
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <div class="img-bar marginTop20">
                                <img class="img-responsive"
                                     src="<?php echo get_template_directory_uri() ?>/assets/img/map.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <div class="selector marginTop20">
                                <div class="inner-selector">
                                    <h2>Select Your Shipping</h2>
                                    <!-- <div class="inner-input radio-delivery"> -->

                                    <!-- 	<?php $shipping //= get_field('shipping', get_the_ID()) ?>
						<?php //if( $shipping ) : ?> 		

							<?php //foreach($shipping as $ship): ?>
								<label class="block">
									<input type="radio" name="delivery" <?php //echo (strtolower($ship['rate']) == 'free') ? 'checked' : null; ?> value="<?php //echo $ship['title'] ?>:<?php //echo $ship['rate']  ?>"> <?php //echo $ship['title'] ?> 
									<span class="spa-2"><?php //echo $ship['rate'] ?></span>
								</label>
							<?php //endforeach; wp_reset_postdata(); ?> 									

						<?php //endif ?> -->


                                    <!-- </div> -->
                                    <!-- UPS Integration -->
                                    <div class="inner-input radio-delivery">
                                        <label class="block hidden spa-ground text-center weight-show">
                                        </label>
                                        <label class="block spa-ground">
                                            <input type="radio" checked="" name="delivery" value="00"> Ground
                                            <span class="pull-right">Free</span>
                                        </label>
                                        <label class="block spa-threeDay">
                                            <input type="radio" name="delivery" value="00"> 3 Day
                                            <span class="pull-right"></span>
                                        </label>
                                        <label class="block spa-twoDay">
                                            <input type="radio" name="delivery" value="00"> 2 Day
                                            <span class="pull-right"></span>
                                        </label>
                                        <label class="block spa-nextDay">
                                            <input type="radio" class="" name="delivery" value="00"> Next Day
                                            <span class="pull-right"></span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="arrow-btn">
                                <button class="btn-danger btn pull-left prevBtn back-to-home" type="button"
                                        onclick="location.href='/'"></button>
                                <button class="btn-info btn pull-right nextBtn on-to-step-2" type="button"></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row setup-content" id="step-2">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ticket-rel">

                    <div class="ticket-nd sn-style stub">
                        <div class="bg-dynamic text-center text-ticket stub-yellow">
                            <div class="text-fixed">
                                <h2><span data-font="30" class="text-1 line-1 lightgray bold">Your Organization</span>
                                </h2>

                                <p><span data-font="20" class="text-2 line-2 lightgray normal">1st Prize $500</span></p>

                                <p><span data-font="20" class="text-3 line-3 lightgray normal">2nd Prize $100</span></p>

                                <p><span data-font="20" class="text-4 line-4 lightgray normal">3rd Prize $25</span></p>

                                <p><span data-font="20" class="text-5 line-5 lightgray normal">Donation: $1.00 • 6 for $5.00</span>
                                </p>

                                <p><span data-font="20"
                                         class="text-6 line-6 lightgray normal">Drawing Held ____________</span></p>

                                <p><span data-font="20" class="text-7 line-7 lightgray normal">Winner need not be present to be eligible</span>
                                </p>

                                <p><span data-font="20" class="text-8 line-8 lightgray normal"></span></p>

                                <p><span data-font="20" class="text-9 line-9 lightgray normal"></span></p>
                                <!-- <p><span data-font="20" class="text-7 line-7">Winner need not be present to be eligible</span></p> -->
                                <!-- 	<div class="clearfix inner-ticket-center"><label class="pull-left" for="">Drawing Held</label><input class="pull-left field field2" type="email" name="" value=""></div>
                                <p>Winner need not be present to be eligible</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger alert-text alert-self hidden">
                        <strong>Note !</strong> One or more lines are too long. Try using a smaller type on these
                        line(s).
                    </div>
                    <div class="actual-ticket">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/actual.png">
                    </div>
                </div>


                <div class="form-2">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pm">
                        <div class="shipping">
                            <h2>Enter Your Ticket lines - it’s okay to leave some lines blank </h2>

                            <h3><i>Above Sample Lines will change as you enter your lines</i></h3>
                            <table class="table custom-table" cellspacing="15">

                                <tbody>
                                <?php
                                $tr_ids = range(1, 9);
                                foreach ($tr_ids as $index => $tr_id){ ?>

                                <tr class="<?php echo $tr_id ?>">
                                    <td width="5%">
                                        <span
                                            class="serial-no"><?php echo $tr_id ?><?php echo ($index == 0) ? '<span class="text-danger">*</span>' : null ?></span>
                                    </td>
                                    <td width="67%">
                                        <div class="form-con">
                                            <input type="text" autocomplete="off" data-required="line_no 1"
                                                   placeholder="" <?php echo ($index == 0) ? 'required' : null ?>
                                                   id="inputLine-<?php echo $index; ?>"
                                                   name="line[<?php echo $index; ?>][text]"
                                                   class="form-control <?php echo ($index == 0) ? 'step1-input ' : null ?>form-input-area input-lg line-text line-<?php echo $tr_id ?>">
                                    </td>
                        </div>
                        <td class="text-center" width="7%">
                            <label for="" class="block">Size</label>
														<span class="text-center">
															<button type="button" value="<?php echo $tr_id ?>-plus"
                                                                    class="btn btn-default btn-label btn-arrow btn-sm center-block font-plus">
                                                                <i class="fa fa-caret-up"></i></button>
															<button type="button" value="<?php echo $tr_id ?>-minus"
                                                                    class="btn btn-default btn-label  btn-arrow btn-sm center-block font-minus">
                                                                <i class="fa fa-caret-down"></i></button>
															<input type="hidden"
                                                                   name="line[<?php echo $index; ?>][font_size]"
                                                                   class="form-control font-size" value="">
														</span>
                        </td>
                        <td class="text-center" width="7%">
                            <label for="" class="block">Normal</label>
                            <button type="button" value="<?php echo $tr_id ?>-normal"
                                    class="btn btn-bold btn-default btn-label btn-sm normal <?php echo ($tr_id != 1) ? 'btn-gray' : null ?>">
                                N
                            </button>
                            <input type="hidden" name="line[<?php echo $index; ?>][normal]"
                                   class="form-control font-normal" value="<?php echo ($tr_id != 1) ? 'yes' : 'no' ?>">
                        </td>
                        <td class="text-center" width="7%">
                            <label for="" class="block">Bold</label>
                            <button type="button" value="<?php echo $tr_id ?>-bold"
                                    class="btn btn-bold btn-default btn-label btn-sm bold <?php echo ($tr_id == 1) ? 'btn-gray' : null ?>">
                                B
                            </button>
                            <input type="hidden" name="line[<?php echo $index; ?>][bold]"
                                   class="form-control font-bold " value="<?php echo ($tr_id == 1) ? 'yes' : 'no' ?>">
                        </td>
                        <td class="text-center" width="7%">
                            <label for="" class="block">Italic</label>
                            <button type="button" value="<?php echo $tr_id ?>-italic"
                                    class="btn btn-bold btn-default btn-label btn-sm italic">I
                            </button>
                            <input type="hidden" name="line[<?php echo $index; ?>][italic]"
                                   class="form-control font-italic" value="no">
                        </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                    </div>
                    <div class="panel-group marginTop20" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 marginTop10">

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" class="toggle-btn"
                                               data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                               aria-controls="collapseOne">
                                                Need more ticket lines ?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <textarea name="extra_line" class="form-control" rows="3"
                                                      placeholder="for Extra Lines"></textarea>

                                            <div class="alert alert-info alert-self">
                                                <strong>Note!</strong> This will not show on the preview but will print
                                                on the ticket
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" class="toggle-btn"
                                               data-parent="#accordion" href="#collapseTwo" aria-expanded="true"
                                               aria-controls="collapseTwo">
                                                For Printing Back of Tickets $15 per Thousand Tickets
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="checkbox ">
                                                <label><input type="checkbox" value="yes"
                                                              name="printing_check">Yes</label>
                                            </div>
                                            <textarea name="printing_back" class="form-control" autocomplete="off"
                                                      rows="3" placeholder="for Printing Back of tickets"></textarea>

                                            <div class="alert alert-info alert-self">
                                                <strong>Note!</strong> This will not show on the preview but will print
                                                on the ticket
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" class="toggle-btn"
                                               data-parent="#accordion" href="#collapseThree" aria-expanded="true"
                                               aria-controls="collapseThree">
                                                Need something different on the stub?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <textarea name="stub_body" class="form-control" autocomplete="off" rows="3"
                                                      placeholder="Not happy with the proof or need something different on the stub?"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" class="toggle-btn"
                                               data-parent="#accordion" href="#collapseFour" aria-expanded="true"
                                               aria-controls="collapseFour">
                                                Instructions or something you want us to change
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <textarea name="change_instruction" class="form-control" rows="3"
                                                      placeholder="Changing Instructions"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 marginTop10">


                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" class="toggle-btn"
                                               data-parent="#accordion" href="#collapseFive" aria-expanded="true"
                                               aria-controls="collapseFive">
                                                Add Stapling or Padding
                                            </a>
                                            <a href="/stapling-and-padding" class="text-blue" target="_blank">
                                                <small>What is Stapling & Padding?</small>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <p>Stapling in books $.06 per books of 5-10-15 or 25. $.09 per book of any
                                                other quantities.
                                                <small>(Specify number of tickets per book)</small>
                                            </p>
                                            <div class="form-group col-md-6">
                                                <select name="stapling_book" id="stapling_book"
                                                        class="form-control input-sm" required="required">
                                                    <option value="0">None</option>
                                                    <?php
                                                    $stapling_book = range(2, 20);
                                                    foreach ($stapling_book as $book) { ?>
                                                        <option value="<?php echo $book ?>"><?php echo $book ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- 	<div class="form-group col-md-12">
                                                    <textarea name="stapling_description" class="form-control" rows="3" placeholder="Stapling Description"></textarea>
                                                </div> -->
                                            <div class="clearfix">&nbsp;</div>


                                            <p> Padding in Books $1.00 per pad of 250 :
                                                <small>(Padding the tickets is cheaper than stapling and makes it easy
                                                    for you to divide into small groups)
                                                </small>
                                            </p>

                                            <div class="checkbox ">
                                                <label><input type="checkbox" value="yes"
                                                              name="padding_book">Yes</label> <span
                                                    class="padding-cg"></span>
                                            </div>
                                            <!--
                                                                                                        <div class="form-group col-md-12">
                                                                                                            <textarea name="padding_description" class="form-control" rows="3" placeholder="Padding Description"></textarea>
                                                                                                        </div> -->


                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingSix">
                                        <h4 class="panel-title">

                                            <a role="button" data-toggle="collapse" class="toggle-btn"
                                               data-parent="#accordion" href="#collapseSix" aria-expanded="true"
                                               aria-controls="collapseSix">
                                                Add Artwork
                                            </a>

                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <p>Only click if adding Logo/Artwork: $10.00 additional
                                                Browse to select your artwork file to upload for your ticket</p>
                                            <a class="btn btn-primary" data-toggle="modal"
                                               href='#Browse-id'>Browse..</a>
                                            <label class="file_attached"></label>
                                            <input type="hidden" name="artwork_uploaded" id="artwork_uploaded"
                                                   class="form-control" value="">

                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingSeven">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" class="toggle-btn"
                                               data-parent="#accordion" href="#collapseSeven" aria-expanded="true"
                                               aria-controls="collapseSeven">
                                                Add Special Services
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <p>(Complete this section ONLY if you have received a quote for special
                                                services)</p>

                                            <div class="checkbox ">
                                                <label><input type="checkbox" value="yes"
                                                              name="special_check">Yes</label>
                                            </div>
                                            <div class="padding10">

                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea name="special_description" autocomplete="off"
                                                              class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Amount <span class="text-info">$</span></label>
                                                    <input type="number" autocomplete="off" value="00"
                                                           name="special_amount" class="form-control" id=""
                                                           placeholder="Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="arrow-btn-2 pull-right">
                                    <button class="btn-danger btn prevBtn back-to-step-1" type="button"></button>
                                    <button class="btn-info btn pull-right nextBtn on-to-finish" type="button"></button>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <div class=" col-xs-12 col-sm-1 col-md-1 col-lg-1 no-pm">

                </div>


            </div>
    </div>


    <div class="row cleafix setup-content" id="step-3">

        <div style="padding:0px; margin:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="ticket-nd sn-style stub">
                <div class="bg-dynamic text-center text-ticket stub-yellow">
                    <div class="text-fixed">
                        <h2><span data-font="30" class="text-1 line-1 lightgray bold">Your Organization</span></h2>

                        <p><span data-font="20" class="text-2 line-2 lightgray normal">1st Prize $500</span></p>

                        <p><span data-font="20" class="text-3 line-3 lightgray normal">2nd Prize $100</span></p>

                        <p><span data-font="20" class="text-4 line-4 lightgray normal">3rd Prize $25</span></p>

                        <p><span data-font="20"
                                 class="text-5 line-5 lightgray normal">Donation: $1.00 • 6 for $5.00</span></p>

                        <p><span data-font="20" class="text-6 line-6 lightgray normal">Drawing Held ____________</span>
                        </p>

                        <p><span data-font="20" class="text-7 line-7 lightgray normal">Winner need not be present to be eligible</span>
                        </p>

                        <p><span data-font="20" class="text-8 line-8 lightgray normal"></span></p>

                        <p><span data-font="20" class="text-9 line-9 lightgray normal"></span></p>
                        <!-- <p><span data-font="20" class="text-7 line-7">Winner need not be present to be eligible</span></p> -->
                        <!-- 	<div class="clearfix inner-ticket-center"><label class="pull-left" for="">Drawing Held</label><input class="pull-left field field2" type="email" name="" value=""></div>
                        <p>Winner need not be present to be eligible</p> -->
                    </div>
                </div>
            </div>
            <div class="alert alert-danger alert-text alert-self hidden">
                <strong>Note !</strong> One or more lines are too long. Try using a smaller type on these line(s).
            </div>
            <div class="actual-ticket">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/actual.png">
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="shipping padding10 third-form clearfix block-box">
                <div class="color-area-bar">
                    <h1>shopping cart</h1>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">


                    <div class="col-sm-3 col-md-3 col-lg-3 form-group mr1">
                        <input type="text" class="form-control" disabled name="ticket_d_quantity"
                               placeholder="Ticket Quantity:">
                        <input type="hidden" class="form-control" name="ticket_c_quantity"
                               placeholder="Ticket Quantity:">
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 form-group mr1">
                        <input type="text" disabled class="form-control" name="ticket_d_style"
                               placeholder="Ticket Style:">
                        <input type="hidden" class="form-control" name="ticket_c_style" placeholder="Ticket Style:">
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 form-group mr1">
                        <input type="hidden" class="form-control" required name="ticket_c_color"
                               placeholder="Ticket Color:">
                        <input type="text" disabled class="form-control" name="ticket_d_color"
                               placeholder="Ticket Color:">
                    </div>

                    <!-- <div class="col-sm-12 col-md-12 col-lg-12 form-group mr1"> -->
                    <input type="hidden" class="form-control" required placeholder="Billing Address"
                           name="ticket_c_billing">
                    <input type="hidden" class="form-control" required placeholder="Total" name="ticket_c_total">
                    <!-- </div> -->
                    <!-- <div class="col-sm-12 col-md-12 col-lg-12 form-group mr1"> -->
                    <!-- </div> -->
                    <div class="col-sm-12 col-md-12 col-lg-12 form-group mr1">
                        <div class="detail-btn">
                            <a class="btn btn-default" data-toggle="modal" href='#order-id'>Click to see order
                                details</a>

                            <p>By placing an order you agree to our <a target="_blank" href="/terms-conditions"
                                                                       title="Terms & Conditions">Terms & Conditions</a>
                            </p>
                        </div>
                        <div class="color-area-bar">
                            <h1>Payment</h1>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 prices">

                    <h5>Price: $ <span class="t_price">00</span></h5>
                    <input type="hidden" class="form-control ticket-charge" id="f0" name="p0" value="0" placeholder="">

                    <!-- 	<h5>Extra lines Charge: $ <span class="more_line_price">00</span></h5>
                        <input type="hidden" class="form-control ticket-charge" id="f1" name="p1" value="0" placeholder="">
                     -->

                    <h5 class="printing_back_price"></h5>
                    <input type="hidden" class="form-control ticket-charge" id="f2" name="p2" value="0" placeholder="">


                    <h5 class="stapling_price"></h5>
                    <input type="hidden" class="form-control ticket-charge" id="f5" name="p5" value="0" placeholder="">


                    <h5 class="padding_price"></h5>
                    <input type="hidden" class="form-control ticket-charge" id="f5" name="p6" value="0" placeholder="">


                    <h5 class="art_price"></h5>
                    <input type="hidden" class="form-control ticket-charge" id="f7" name="p7" value="0" placeholder="">

                    <h5 class="special_price"></h5>
                    <input type="hidden" class="form-control ticket-charge" id="f8" name="p8" value="0" placeholder="">

                    <h5>Delivery Charges: $ <span class="delivery_charge">00</span></h5>
                    <input type="hidden" class="form-control ticket-charge" id="f9" name="p9" value="0" placeholder="">

                    <h4>Total: $ <span class="ticket-total-price"></span></h4>
                    <input type="hidden" class="form-control ticket-total" id="f10" name="p10" value="0" placeholder="">

                    <!-- <button type="button" class="btn btn-default btn-calculate">button</button> -->

                    <!-- <h5>Something different Charge: $ <span class="some_dif_price">00</span></h5>
                                                           <input type="hidden" class="form-control ticket-charge" id="f3"  name="p3" value="0" placeholder="">


                                                           <h5>Instructions: $ <span class="instruction_price">00</span></h5>
                                                           <input type="hidden" class="form-control ticket-charge" id="f4"  name="p4" value="0" placeholder="">										 -->

                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <h3>To pay with Pay Pal, Credit &amp; Debit Card or E-Check</h3>

                    <div class="col-md-12 margin-top">
                        <label class="div-method pull-left">
                            <input class="radio-method" type="radio" name="payment_method" checked=""
                                   value="credit_debit">
                            <img alt="Authorized"
                                 src="<?php echo get_template_directory_uri() ?>/assets/img/credit-card.png"
                                 class="img60">
                        </label>
                        <label class="middle-label">
                            Or pay with
                        </label>
                        <label class="div-method pull-right">
                            <input class="radio-method" type="radio" name="payment_method" value="paypal">
                            <img alt="Paypal" src="<?php echo get_template_directory_uri() ?>/assets/img/paypal.png"
                                 class="img60">
                        </label>
                    </div>
                    <!-- <button id="paypal5">

                    </button> -->
                </div>
                <!-- 	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h3>To pay with Pay Pal, Credit & Debit Card or E-Check</h3>

                            <div class="col-md-8 margin-top">
                                <select name="payment_method" class="form-control" required="required">
                                    <option value="">Select Payment Method</option>
                                    <option value="credit_debit">Credit & Debit Card</option>
                                    <option value="paypal">Paypal</option>
                                </select>
                            </div> -->
                <!-- <button id="paypal5">

                </button> -->
                <!-- </div> -->

                <div class="col-xs-12 col-sm-12 col-md-5 arrow-btn-3 pull-right">
                    <button class="btn-danger btn pull-left prevBtn back-to-step-2" type="button"></button>

                    <button class="btn-info btn pull-right nextBtn formSubmit submit-order" type="button"></button>
                </div>


            </div>

        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <div class="txt-ticket">
                <!-- <h3>Actual Size 21/8" x 51/2"</h3> -->

            </div>
        </div>


    </div>
    <!--step 3-->


    </form>
</div><!--container-->
</div><!--required-->
<!-- <a class="btn btn-primary" data-toggle="modal" href='#Browse-id'>Trigger modal</a>
 -->
<div class="modal fade modal-attach" id="Browse-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add artwork</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">

                    <strong>Note:</strong> The upload file size is limited to 1 megabyte <br>
                    <strong>Note:</strong> File types are limited to .jpg, .jpeg, .gif, .tif, .pdf, .doc, .docx, .eps,
                    .pub, .bpm, .png, .pptx, .ppt <br>
                    <strong>Note:</strong> Larger images might take a little while to upload<br>
                    Your artwork should be at least 300 dpi.<br> Don't worry about the size of the artwork we will size
                    it for you<br>
                    Your uploaded artwork will not show on the preview.<br> You will receive a proof the same or next
                    business day<br>

                </div>
                <input type="file" name="artwork_file" id="artwork_file" class="form-control " value="">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary uploadFile">Save</button>

            </div>
        </div>
    </div>
</div>


<div class="authorized-generete"></div>

<input class="hidden" type="image"
       border="0"
       alt="PayPal — The safer, easier way to pay online."
       name="submit"
       src="<?php echo get_template_directory_uri() ?>/assets/img/paypal.png"
       data-business="azprinting@aol.com"
       data-item_name="Raffle Ticket Payment"
       data-amount="10.99"
       data-quantity="1"
       data-return=""
       data-currency_code="USD"
       class="ClassyPaypal-button"
       id="paypalPayment">

<div class="modal fade" id="order-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="clearfix">
                    <div style="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="ticket-nd sn-style stub">
                            <div class="bg-dynamic text-center text-ticket stub-yellow">
                                <div class="text-fixed">
                                    <h2><span data-font="30"
                                              class="text-1 line-1 lightgray bold">Your Organization</span></h2>

                                    <p><span data-font="20" class="text-2 line-2 lightgray normal">1st Prize $500</span>
                                    </p>

                                    <p><span data-font="20" class="text-3 line-3 lightgray normal">2nd Prize $100</span>
                                    </p>

                                    <p><span data-font="20" class="text-4 line-4 lightgray normal">3rd Prize $25</span>
                                    </p>

                                    <p><span data-font="20" class="text-5 line-5 lightgray normal">Donation: $1.00 • 6 for $5.00</span>
                                    </p>

                                    <p><span data-font="20" class="text-6 line-6 lightgray normal">Drawing Held ____________</span>
                                    </p>

                                    <p><span data-font="20" class="text-7 line-7 lightgray normal">Winner need not be present to be eligible</span>
                                    </p>

                                    <p><span data-font="20" class="text-8 line-8 lightgray normal"></span></p>

                                    <p><span data-font="20" class="text-9 line-9 lightgray normal"></span></p>
                                    <!-- <p><span data-font="20" class="text-7 line-7">Winner need not be present to be eligible</span></p> -->
                                    <!-- 	<div class="clearfix inner-ticket-center"><label class="pull-left" for="">Drawing Held</label><input class="pull-left field field2" type="email" name="" value=""></div>
                                    <p>Winner need not be present to be eligible</p> -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h5><strong>Name:</strong> <span class="pre-name"></span></h5>
                        <h5><strong>Email:</strong> <span class="pre-email"></span></h5>
                        <h5><strong>Day Phone:</strong> <span class="pre-day"></span></h5>
                        <h5><strong>Cell / Alt Phone:</strong> <span class="pre-cell"></span></h5>
                        <h5><strong>Shipping Address:</strong> <span class="pre-address"></span></h5>
                        <h5><strong></strong> <span class="pre-address-2"></span></h5>
                        <h5><strong>City: </strong> <span class="pre-city"></span></h5>
                        <h5><strong>State: </strong> <span class="pre-state"></span></h5>
                        <h5><strong>ZipCode: </strong> <span class="pre-zipcode"></span></h5>
                        <h5><strong>Billing Adddress:</strong> <span class="pre-b-address">Same as Shipping</span></h5>
                        <h5><span class="pre-b-city"></span></h5>
                        <h5><span class="pre-b-state"></span></h5>
                        <h5><span class="pre-b-zipcode"></span></h5>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h5><strong>Quantity & Price: </strong> <span class="pre-qp"></span></h5>
                        <h5><strong>Color: </strong> <span class="pre-color"></span></h5>
                        <h5><strong>Style: </strong> <span class="pre-style"></span></h5>
                        <h5 class="pre-morelines"></h5>
                        <h5 class="pre-different"></h5>
                        <h5 class="pre-instruction"></h5>
                        <h5 class="pre-printdesc"></h5>
                        <h5 class="pre-specialdesc"></h5>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <h5 class="pre-stapling"></h5>
                        <h5 class="pre-padding"></h5>
                        <h5 class="pre-artwork"></h5>
                        <h5 class="pre-printback"></h5>
                        <h5 class="pre-special"></h5>
                        <h5 class="pre-delivery"></h5>
                        <h5><strong>Total: $</strong> <span class="pre-total">00</span></h5>
                    </div>
                </div>


            </div>
            <!-- 	<div class="modal-footer">

                </div> -->
        </div>
    </div>
</div>
<!-- <a class="btn btn-primary" data-toggle="modal" href=''>Browse..</a> -->

<?php get_footer(); ?>
