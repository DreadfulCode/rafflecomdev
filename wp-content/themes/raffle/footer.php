<?php if (!is_page('ticket-pricing-colors')) : ?>


    <div class="links-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="link-area paddingTop50 paddingBottom20">

                        <?php /**
                         * Displays a navigation menu
                         * @param array $args Arguments
                         */
                        $args = array(
                            'menu_class' => 'list-unstyled resource-bar',
                            'menu' => 'Footer Menu 1'
                        );
                        wp_nav_menu($args);
                        ?>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="link-area paddingTop50">
                        <?php /**
                         * Displays a navigation menu
                         * @param array $args Arguments
                         */
                        $args = array(
                            'menu_class' => 'list-unstyled resource-bar',
                            'menu' => 'Footer Menu 2'
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="link-area paddingTop50">
                        <?php /**
                         * Displays a navigation menu
                         * @param array $args Arguments
                         */
                        $args = array(
                            'menu_class' => 'list-unstyled resource-bar',
                            'menu' => 'Footer Menu 3'
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="link-area paddingTop50">
                        <?php /**
                         * Displays a navigation menu
                         * @param array $args Arguments
                         */
                        $args = array(
                            'menu_class' => 'list-unstyled resource-bar',
                            'menu' => 'Footer Menu 4'
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<footer>
    <div class="footer paddingTop20 paddingBottom10">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="star">
                        <p class="aim">
                            <img class="pull-left img-responsive"
                                 src="<?php echo get_template_directory_uri() . '/assets/img/star.png' ?>">
                            <span class="pull-right"><?php echo ot_get_option('footer_content') ?></span>
                        </p>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="socail-bar">
                        <ul class="list-unstyled list-inline">


                            <?php if (ot_get_option('facebook')): ?>
                                <li><a href="<?php echo ot_get_option('facebook') ?>"><img
                                        src="<?php echo get_template_directory_uri() ?>/assets/img/socail-1.png" alt=""></a>
                                </li><?php endif ?>
                            <?php if (ot_get_option('twitter')): ?>
                                <li><a href="<?php echo ot_get_option('twitter') ?>"><img
                                        src="<?php echo get_template_directory_uri() ?>/assets/img/socail-2.png" alt=""></a>
                                </li><?php endif ?>
                            <?php if (ot_get_option('google_plus')): ?>
                                <li><a href="<?php echo ot_get_option('google_plus') ?>"><img
                                        src="<?php echo get_template_directory_uri() ?>/assets/img/socail-3.png" alt=""></a>
                                </li><?php endif ?>
                            <?php if (ot_get_option('blog')): ?>
                                <li><a href="<?php echo ot_get_option('blog') ?>"><img
                                        src="<?php echo get_template_directory_uri() ?>/assets/img/socail-4.png" alt=""></a>
                                </li><?php endif ?>
                            <!--   <?php //if (ot_get_option('youtube')): ?><li><a href="<?php //echo ot_get_option('youtube') ?>"><img src="<?php //echo get_template_directory_uri() ?>/assets/img/youtube.png" alt=""></a></li><?php //endif ?> -->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="copyright-area text-center">
                        <p>Copyright © <?php echo date('Y') ?> - <?php echo ot_get_option('copyright'); ?> | <a
                                href="/privacy-policy">Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var owl_test = $("#owl-testimonial");
        owl_test.owlCarousel({

            autoPlay: 100000, //Set AutoPlay to 3 seconds

            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: [340, 1], // itemsMobile disabled - inherit from itemsTablet option
            mouseDrag: true,
            stopOnHover: true,
            navigation: false,
            pagination: false,
            responsive: true,
            autoHeight: true,

        });
        // Custom Navigation Events
        $(".next-test").click(function () {
            owl_test.trigger('owl.next');
        })
        $(".prev-test").click(function () {
            owl_test.trigger('owl.prev');
        });


    });
</script>


<?php if (is_page('ticket-pricing-colors')) : ?>

    <script type="text/javascript">

        jQuery(document).ready(function ($) {

            $("a.step1, a.step2, a.step3").on('click', function (e) {
                e.preventDefault();
                return false;
            });

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                    $("span.step2").show();
                    $("a.step2").hide();
                    $("span.step3").show();
                    $("a.step3").hide();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find(".step1-input"),
                    isValid = true;
                // temporary off
                if (curStepBtn == 'step-1') {
                    $("span.step2").hide();
                    $("a.step2").show();

                    $("span.step1").show();
                    $("a.step1").hide();
                } else if (curStepBtn == 'step-2') {
                    $("span.step3").hide();
                    $("a.step3").show();

                    $("span.step2").addClass('btn-primary').show();
                    $("a.step2").hide();
                }

                // console.log(curStepBtn);


                $(".form-group").removeClass("has-error");
                var names = new Array();
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        var nameAttr = $(curInputs[i]).attr('data-required');

                        var name = nameAttr.replace('_', ' ');


                        names.push('<span class"text-capitalize">' + name + '</span>');


                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        $(curInputs[i]).closest(".form-con").addClass("has-error");
                    }
                }

                var delivery = $('input[name=zip_code]').val();
                var email = $('input[name=email]').val();


                if (isValid == false) {
                    swal({
                        title: "Validation",
                        text: names.join(" is required<br>").toString() + ' is required',
                        type: "warning",
                        html: true
                    });

                } else if (delivery.length != 5) {
                    isValid = false;
                    sweetAlert("Error...", "Please Insert Valid ZipCode", "error");
                } else if (!isValidEmailAddress(email)) {
                    isValid = false;
                    sweetAlert("Error...", "Please Enter Valid Email", "error");
                } else {
                    isValid = true;
                }


                total_ticket();

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');


            });

            allPrevBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

                $(".form-group").removeClass("has-error");
                $(".form-con").removeClass("has-error");
                prevStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');


            $('input[name=color]').blur(function () {
                // change ticket color
                $('.ticket-bg').css({
                    'background-color': $(this).val()
                });

            });


            $('input[name=address_2]').blur(function () {
                // change ticket color
                $('.pre-address-2').html($(this).val());
            });


            var selectedQuantity = $('select[name=quantity]');
            var valueQR = selectedQuantity.val().split('-');
            $('input[name=ticket_c_quantity]').val(valueQR[0]);
            $('input[name=ticket_d_quantity]').val(valueQR[0]);
            $('input[name=ticket_c_total]').val(valueQR[1]);
            $('.t_price').html(valueQR[1]);
            $('input[name=p0]').val(valueQR[1]);
            $('.pre-qp').html(valueQR[0] + 'Qty -- $ ' + valueQR[1]);


            var selectedStyle = $('input[name=style]');
            $('input[name=ticket_c_style]').val(selectedStyle.val());
            $('input[name=ticket_d_style]').val(selectedStyle.val());
            $('.pre-style').html(selectedStyle.val());

            var selectedColor = $('input[name=color]').data('color');
            var valueColor = selectedColor.split(":");
            $('input[name=ticket_c_color]').val(valueColor[0]);
            $('input[name=ticket_d_color]').val(valueColor[0]);
            $('.pre-color').html(valueColor[0]);


            $('input[name=style]').change(function () {
                $('input[name=ticket_c_style]').val($(this).val());
                $('input[name=ticket_d_style]').val($(this).val());
                $('.pre-style').html($(this).val());
            });

            $('input[name=day_phone]').blur(function () {
                $('.pre-day').html($(this).val());
            });


            $('input[name=phone_number]').blur(function () {
                $('.pre-cell').html($(this).val());
            });


            $('input[name=email]').blur(function () {
                $('.pre-email').html($(this).val());
            });

            $('input[name=color]').change(function () {
                var selectedColor = $(this).data('color');
                var valueColor = selectedColor.split(":");
                $('input[name=ticket_c_color]').val(valueColor[0]);
                $('input[name=ticket_d_color]').val(valueColor[0]);
                $('.pre-color').html(valueColor[0]);

                if (valueColor[0] == 'Yellow') {
                    $('.bg-dynamic').removeClass('stub-blue stub-white stub-pink stub-green').addClass('stub-yellow');
                } else if (valueColor[0] == 'Blue') {
                    $('.bg-dynamic').removeClass('stub-yellow stub-white stub-pink stub-green').addClass('stub-blue');
                } else if (valueColor[0] == 'White') {
                    $('.bg-dynamic').removeClass('stub-blue stub-yellow stub-pink stub-green').addClass('stub-white');
                } else if (valueColor[0] == 'Pink') {
                    $('.bg-dynamic').removeClass('stub-blue stub-white stub-yellow stub-green').addClass('stub-pink');
                } else if (valueColor[0] == 'Green') {
                    $('.bg-dynamic').removeClass('stub-blue stub-white stub-pink stub-yellow').addClass('stub-green');
                }

            });


            $('input[name=billing_as_shipping]').change(function () {
                if ($(this).val() == 'yes') {
                    $('textarea[name=ticket_c_billing]').val($('input[name=address]').val());
                    $('.pre-b-address').html($('input[name=address]').val());

                } else {
                    $('#billing-id').modal({
                        show: true,
                        keyboard: false,
                        backdrop: 'static'
                    });
                    $('textarea[name=ticket_c_billing]').val('');

                }
            });

            $('textarea[name=ticket_c_billing]').blur(function () {
                $('.pre-b-address').html($(this).val());
            });


            $('select[name=quantity]').change(function () {
                var value = $(this).val().split("-");
                $('input[name=ticket_c_quantity]').val(value[0]);
                $('input[name=ticket_d_quantity]').val(value[0]);
                $('input[name=ticket_c_total]').val(value[1]);
                $('input[name=ticket_d_total]').val(value[1]);
                $('.t_price').html(value[1]);
                $('input[name=p0]').val(value[1]);
                $('.pre-qp').html(value[0] + 'Qty -- $ ' + value[1]);

                var stapling_book = $('select[name=stapling_book]').val();
                if (stapling_book != '0') {
                    calculate_stapling(value[0], stapling_book);
                    var stab_amount = $('input[name=p5]').val();
                    $('.pre-stapling').html('<strong>Stapling $ </strong>' + stab_amount);

                } else {
                    $('.stapling_price').html('');
                    $('input[name=p5]').val('00');
                }

                var zip_code = $('input[name=zip_code]').val();
                if (zip_code.length == 5) {
                    {

                        $('.pre-zipcode').html(zip_code);

                        swal({
                            title: "UPS Shipping Calculate",
                            text: "<i class='fa fa-spinner fa-pulse fa-3x'></i>",
                            html: true,
                            showConfirmButton: false,
                            timer: 6000,
                            imageUrl: '<?php echo ot_get_option("ups_logo"); ?>',
                        });

                        get_ups_rate(value[2], zip_code);
                        $('input[name=delivery]').focus();
                    }

                }


                var check_padding = $('input[name=padding_book]').is(":checked");
                if (check_padding) {
                    var pc = '0.004';
                    calculate_padding(pc, value[0]);
                }
                var check_printing_check = $('input[name=printing_check]').is(":checked");
                if (check_printing_check) {
                    var pp = '0.015';
                    calculate_prinitng(pp, value[0]);
                }

            });


            $('.line-text').keyup(function () {


                var value = $(this).closest('tr').find('.normal').val();
                var textClass = '.text-' + value[0];

                $(this).closest('tr').find('.font-size').val($(textClass).data('font'));

                $(textClass).html($(this).val());
                $(textClass).removeClass('lightgray');

                font_error(textClass, value[0]);

            });


            function font_error(textClass, i) {
                var lenght = $(textClass).width();
                var style = $('input[name=style]:checked').val();
                if (style == 'Stub') {
                    if (lenght > 480) {
                        $('.alert-text').removeClass('hidden').addClass('alt-' + i + ' show');
                    } else {
                        $('.alt-' + i).removeClass('show').addClass('hidden');
                    }

                } else {
                    if (lenght > 680) {
                        $('.alert-text').removeClass('hidden').addClass('alt-' + i + ' show');
                    } else {
                        $('.alt-' + i).removeClass('show').addClass('hidden');
                    }
                }
            }

            $('.normal').click(function () {

                $(this).toggleClass('btn-gray');

                $(this).closest('tr').find('.font-bold').val('no');
                $(this).closest('tr').find('.font-italic').val('no');
                $(this).closest('tr').find('.bold').removeClass('btn-gray');
                $(this).closest('tr').find('.italic').removeClass('btn-gray');

                value = $(this).val().split("-");
                var textClass = '.text-' + value;
                font_error(textClass, value[0]);

                $(textClass).toggleClass('normal');

                $(textClass).removeClass('bold');
                $(textClass).removeClass('italic');
                $(textClass).removeClass('bold-italic');

                var normalFont = $(this).closest('tr').find('.font-normal');
                (normalFont.val() == 'yes') ? normalFont.val('no') : normalFont.val('yes');

            });

            $('.bold').click(function () {
                $(this).toggleClass('btn-gray');
                value = $(this).val().split("-");
                var textClass = '.text-' + value;

                font_error(textClass, value[0]);
                var boldFont = $(this).closest('tr').find('.font-bold');
                (boldFont.val() == 'yes') ? boldFont.val('no') : boldFont.val('yes');
                var italicFont = $(this).closest('tr').find('.font-italic').val();
                if (italicFont == 'yes') {
                    $(textClass).removeClass('bold');
                    $(textClass).toggleClass('bold-italic');

                } else {

                    $(textClass).toggleClass('bold');

                }

            });

            $('.italic').click(function () {
                $(this).toggleClass('btn-gray');
                value = $(this).val().split("-");
                var textClass = '.text-' + value;

                font_error(textClass, value[0]);
                var italicFont = $(this).closest('tr').find('.font-italic');
                (italicFont.val() == 'yes') ? italicFont.val('no') : italicFont.val('yes');
                var boldFont = $(this).closest('tr').find('.font-bold').val();
                if (boldFont == 'yes') {
                    $(textClass).removeClass('italic');
                    $(textClass).toggleClass('bold-italic');

                } else {

                    $(textClass).toggleClass('italic');
                }
            });

            $('.font-minus').click(function () {
                value = $(this).val().split("-");
                var textClass = '.text-' + value[0];
                var fontSize = $(textClass).data('font');
                var minus = fontSize - 1;

                if (minus != 11) {
                    font_error(textClass, value[0]);
                    $(textClass).data('font', minus).css("fontSize", minus + 'px');
                    var fontSizeHidden = $(this).closest('tr').find('.font-size');
                    fontSizeHidden.val(minus);
                }

            });

            $('.font-plus').click(function () {
                value = $(this).val().split("-");
                var textClass = '.text-' + value[0];
                var fontSize = $(textClass).data('font');
                var plus = fontSize + 1;
                var line = value[0];

                if (plus != 36) {
                    font_error(textClass, value[0]);
                    $(textClass).data('font', plus).css("fontSize", plus + 'px');
                    var fontSizeHidden = $(this).closest('tr').find('.font-size');
                    fontSizeHidden.val(plus);
                }

            });


            // extra line charges
            $('textarea[name=extra_line]').blur(function () {
                $('.more_line_price').html('');
                $('input[name=p1]').val('');
                $('.pre-morelines').html('<strong>More Lines:</strong> ' + $(this).val());

            });

            // extra line charges
            $('input[name=address]').blur(function () {
                $('input[name=ticket_c_shipping]').val($(this).val());
                var bs = $('input[name=billing_as_shipping]:checked').val();
                if (bs == 'yes') {
                    $('textarea[name=ticket_c_billing]').val($('input[name=address]').val());
                }
                $('.pre-address').html($(this).val());
            });


            // extra line charges
            $('input[name=fullname]').blur(function () {
                $('.pre-name').html($(this).val());


                // change ticket color
                if (/\w+\s+\w+/.test($(this).val())) {
                    $(this).closest('.form-group').removeClass('has-error').addClass('has-success');
                } else {
                    $(this).closest('.form-group').addClass('has-error');
                    sweetAlert("Error...", "Please enter First and Last Name", "error");
                }


            });
            // extra line charges
            $('input[name=city]').blur(function () {
                $('.pre-city').html($(this).val());
            });

            $('select[name=state]').blur(function () {
                $('.pre-state').html($(this).val());
            });

            var state = $('select[name=state]').val();
            $('.pre-state').html(state);


            // printing back charges
            $('textarea[name=printing_back]').blur(function () {
                var check = $('input[name=printing_check]').is(":checked");
                if (check) {
                    $('.pre-printdesc').html('<strong>Printing Back Instruction: </strong> <br>' + $(this).val().replace(/\n/g, "</br>"));

                } else {
                    $('.pre-printdesc').html('');
                }
            });


            $('input[name=printing_check]').change(function () {
                if (this.checked) {

                    var selectedQuantity = $('select[name=quantity]');
                    var valueQR = selectedQuantity.val().split('-');
                    var pp = this.checked ? '0.015' : '';
                    calculate_prinitng(pp, valueQR[0]);
                    var text_print = $('textarea[name=printing_back]');
                    $('.pre-printdesc').html('<strong>Printing Back Instruction: </strong><br>' + text_print.val().replace(/\n/g, "</br>"));


                } else {

                    $('.printing_back_price').html('');
                    $('input[name=p2]').val('');
                    $('.pre-printdesc').html('');

                }
            });

            function calculate_prinitng(pp, qty) {

                // console.log(pc+'--'+qty);
                var charge = pp * qty;
                $('.printing_back_price').html('Printing back Charge: $ ' + charge);
                $('input[name=p2]').val(charge);
                $('.pre-printback').html('<strong>Printing back: </strong> $ ' + charge);
                var printing_back = $('textarea[name=printing_back]').val();
                $('.pre-printdesc').html('<strong>Printing Back Instruction: </strong> ' + printing_back);

            }


            // need some thing different
            $('textarea[name=stub_body]').blur(function () {
                // $('#f3').val($(this).val());
                $('.some_dif_price').html('');
                $('input[name=p3]').val('');
                $('.pre-different').html('<strong>Something different: </strong> ' + $(this).val());
            });

            // change instruction
            $('textarea[name=change_instruction]').blur(function () {
                // $('#f4').val($(this).val());
                $('.instruction_price').html('');
                $('input[name=p4]').val('');
                $('.pre-instruction').html('<strong>Instruction: </strong> ' + $(this).val());

            });


            // padding book
            $('input[name=padding_book]').change(function () {

                if (this.checked) {
                    var selectedQuantity = $('select[name=quantity]');
                    var valueQR = selectedQuantity.val().split('-');

                    var pc = this.checked ? '0.004' : '';
                    calculate_padding(pc, valueQR[0]);
                } else {
                    $('.padding-cg').html('');
                    $('.padding_price').html('');
                    $('input[name=p6]').val('00');
                    $('.pre-padding').html('');
                }

            });

            function calculate_padding(pc, qty) {
                // console.log(pc+'--'+qty);
                var charge = pc * qty;
                $('.padding-cg').html('<strong>Padding Charges: </strong>$ ' + charge);
                $('.padding_price').html('Padding Charge: $ ' + charge);
                $('input[name=p6]').val(charge);
                $('.pre-padding').html('<strong>Padding Charges:</strong> $ ' + charge);

            }

            // artwork file
            $('input[name=artwork_file]').blur(function () {
                $('.art_price').html('Art Work: $ 10');
                $('.pre-artwork').html('<strong>Art Work Attached:</strong> $ 10');
                $('input[name=p7]').val('10');
            });


            // special description
            $('textarea[name=special_description]').blur(function () {

                var check = $('input[name=special_check]').is(":checked");
                if (check) {
                    $('.pre-specialdesc').html('<strong>Special Description:</strong> ' + $(this).val());
                } else {
                    $('.pre-specialdesc').html('');
                }

            });


            $('input[name=special_amount]').blur(function () {
                // $('input[name=special]').attr('checked', true);
                check = $('input[name=special_check]');

                if (check.val() == 'yes') {
                    var special_charges = $(this).val();
                    // if(special_charges > 9){
                    $('input[name=p8]').val(special_charges);
                    $('.special_price').html('Special Services Charge: $ ' + special_charges);
                    $('.pre-special').html('<strong>Special Services</strong> $ ' + special_charges);

                    // } else {
                    // sweetAlert("Error...", "Minimum $10 Special Charges", "error");
                    // }
                } else {
                    $('input[name=p8]').val('');
                    $('.special_price').html('');
                    $('.pre-special').html('');

                }
            });

            $('input[name=special_check]').change(function () {

                if (this.checked) {
                    var special_charges = $('input[name=special_amount]').val();
                    // if(special_charges > 9){
                    $('input[name=p8]').val(special_charges);
                    $('.special_price').html('Special Services Charge: $ ' + special_charges);
                    $('.pre-special').html('<strong>Special Services</strong> $ ' + special_charges);
                    var special_description = $('textarea[name=special_description]');
                    $('.pre-specialdesc').html('<strong>Special Description:</strong> ' + special_description.val());
                    // } else {
                    //   sweetAlert("Error...", "Minimum $10 Special Charges", "error");
                    // }
                } else {
                    $('.pre-special').html('');
                    $('input[name=p8]').val('');
                    $('.special_price').html('');
                    $('.pre-specialdesc').html('');

                }
            });


            $('input[type=radio][name=style]').change(function () {

                var stub = $(this).val();
                if (stub == 'No Stub') {
                    $('.ticket-nd').removeClass('stub').addClass('no-stub');
                } else {
                    $('.ticket-nd').removeClass('no-stub').addClass('stub');
                }

            });

            total_ticket();


            $('.formSubmit').on('click', function (e) {
                e.preventDefault();

                var check = $('input[name=payment_method]').is(":checked");
                if (check) {
                    var payment = $('input[name=payment_method]:checked').val();
                    var total = $('input[name=ticket_c_total]').val();

                    getAuthorized(total);
                    // $(this).attr('disabled','disabled');
                    $('.block-box').block({
                        message: '<h1>Processing</h1>',
                        css: {border: '3px solid #a00'}
                    });
                    var form = $(this).closest('form');
                    var action = form.attr('action');
                    var data = form.serializeArray();
                    $.post(action, data, function (response) {
                        if (response.success == true) {
                            var url = '<?php echo get_permalink(334); ?>?id=' + response.p_id;
                            var total = response.total.split('.');
                            $('#paypalPayment').attr('data-amount', total[0]);
                            // return false;
                            if (payment == 'paypal') {
                                $("#paypalPayment").trigger('click');
                            } else if (payment == 'credit_debit') {
                                $('#auth_form').find('input[type=image]').trigger('click');
                            } else {
                                $('.block-box').unblock();
                                $(this).removeAttr('disabled', 'disabled');
                                sweetAlert("Error...", "Payment Method Error", "error");
                            }

                        } else {
                            $('.block-box').unblock();
                            // $('.submit-order').removeAttr('disabled','disabled');
                            sweetAlert("Validation Error", response.message, "error");

                        }
                    }, 'json');
                } else {
                    sweetAlert("Error...", "Select Payment Method", "error");
                }


            });


            function total_ticket() {
                var ticketCharge = $('.ticket-charge');
                var total = 0;

                $.each(ticketCharge, function (i, v) {
                    if ($(v).val() != '') {
                        total += parseFloat($(v).val());
                    }

                });
                // console.log(total);

                $(".ticket-total-price").html(total.toFixed(2));
                $('.pre-total').html(total.toFixed(2));

                $(".ticket-total").val('$' + total.toFixed(2));
                $('input[name=ticket_c_total]').val(total.toFixed(2));
                $('.pay_amount').val(total.toFixed(2));

            }

            $('.btn-calculate').click(function (e) {
                total_ticket();
            });


            $('input[name=zip_code]').keyup(function (e) {

                var zip_code = $(this).val();
                if (zip_code.length == 5) {
                    if ($.isNumeric(zip_code) == true) {
                        if ($(this).attr('data-zipcode') != zip_code) {

                            $('.pre-zipcode').html(zip_code);

                            swal({
                                title: "UPS Shipping Calculate",
                                text: "<i class='fa fa-spinner fa-pulse fa-3x'></i>",
                                html: true,
                                showConfirmButton: false,
                                timer: 6000,
                                imageUrl: '<?php echo ot_get_option("ups_logo"); ?>',
                            });
                            var selectedQuantity = $('select[name=quantity]');
                            var valueQR = selectedQuantity.val().split('-');
                            get_ups_rate(valueQR[2], zip_code);

                        }
                    } else {
                        sweetAlert("Error...", "Invalid ZipCode!", "error");
                    }


                }

            });


            $('input[name=delivery]').change(function (e) {
                if ($(this).val() != '') {
                    var value = $(this).val().split(' ');
                    $('.delivery_charge').html(value[1]);
                    $('.pre-delivery').html('<strong>Delivery Charges:</strong> $ ' + value[1]);
                    $('input[name=p9]').val(value[1]);
                } else {
                    sweetAlert("Error...", "Please Insert ZipCode", "error");
                }

            });

            $(".phone2").mask("999 999-9999");
            $(".phone1").mask("999 999-9999");
            $(".zipcode_b").mask("99999");


            $('select[name=stapling_book]').change(function (e) {
                if ($(this).val() != '0') {
                    var selectedQuantity = $('select[name=quantity]');
                    var valueQR = selectedQuantity.val().split('-');

                    calculate_stapling(valueQR[0], $(this).val());
                    var stab_amount = $('input[name=p5]').val();
                    $('.pre-stapling').html('<strong>Stapling $ </strong>' + stab_amount);


                } else {
                    $('.stapling_price').html('');
                    $('input[name=p5]').val('00');
                }

            });

            function calculate_stapling(qty, stapling) {
                if (stapling == 5 || stapling == 10 || stapling == 15 || stapling == 20) {
                    var calc = qty / stapling * 0.06;
                    $('.stapling_price').html('Stapling Charge: $ ' + calc.toFixed(2));
                    $('input[name=p5]').val(calc.toFixed(2));
                } else {
                    var calc = qty / stapling * 0.09;
                    $('.stapling_price').html('Stapling Charge: $ ' + calc.toFixed(2));
                    $('input[name=p5]').val(calc.toFixed(2));
                }
            }


            function getAuthorized(x_amount) {
                var ajaxUrl = '<?php echo admin_url("admin-ajax.php"); ?>';
                $.post(ajaxUrl, {'action': 'getAuthorized', amount: x_amount},
                    function (response) {
                        if (response.success == true) {
                            $('.authorized-generete').html(response.data);
                        }
                    });
            }


            function get_ups_rate(w, zip_code) {


                var ajaxUrl = '<?php echo admin_url("admin-ajax.php"); ?>';
                var from = '<?php echo ot_get_option("from_zipcode") ?>';
                $.get('http://www.raffle-api.designhostss.website/index.php', {
                    'zip_code': zip_code,
                    weight: w,
                    from_zip: from
                }, function (response) {
                    // aa = response;
                    // var resp = $.makeArray(response.rates_group);
                    if (response.success == true) {
                        $('.weight-show').html('Weight ' + w + ' LB');
                        $('input[name=zip_code]').attr('data-zipcode', zip_code);
                        // $('.spa-ground').find('input').val(response.rates_ground);
                        // $('.spa-ground').find('span').html(response.rates_ground);
                        $('.spa-nextDay').find('input').val(response.rates_nextday_air);
                        $('.spa-nextDay').find('span').html(response.rates_nextday_air);
                        $('.spa-twoDay').find('input').val(response.rates_secondday_air);
                        $('.spa-twoDay').find('span').html(response.rates_secondday_air);
                        $('.spa-threeDay').find('input').val(response.rates_threedays_select);
                        $('.spa-threeDay').find('span').html(response.rates_threedays_select);


                        var check = $('input[name=delivery]:checked').val();
                        if (check != '00') {
                            var value = check.split(' ');
                            $('.delivery_charge').html(value[1]);
                            $('.pre-delivery').html('<strong>Delivery Charges:</strong> $ ' + value[1]);
                            $('input[name=p9]').val(value[1]);
                        }


                    }
                    console.log(response);

                }, 'json');


                // sweetAlert("Error...", "Zipcode Less Than 6 Digit", "error");

            }


            function isValidEmailAddress(emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            }

            $('#paypalPayment').ClassyPaypal({
                type: 'buynow',
                style: 'default',
                tooltip: 'Pay safely with PayPal!'
            });


            $('.btn-save-billing').click(function (e) {
                e.preventDefault(e);
                billingInput = $('#billing-id').find(".billing-address");
                isBvalid = false;
                for (var i = 0; i < billingInput.length; i++) {
                    if (!billingInput[i].validity.valid) {
                        isBvalid = false;
                        var nameAttr = $(billingInput[i]).attr('name');
                        var name = nameAttr.replace('_', ' ');
                        $(billingInput[i]).closest(".form-group").addClass("has-error");

                    } else {
                        isBvalid = true;
                    }
                }

                if (isBvalid == true) {
                    $(this).closest('form-group').removeClass('has-error').addClass('has-success');
                    $('#billing-id').modal('hide');
                    // var ticket_c_billing = $('textarea[name=ticket_c_billing]').val();
                    var state_b = $('select[name=state_b]').val();
                    var zip_code_b = $('input[name=zip_code_b]').val();
                    var city_b = $('input[name=city_b]').val();
                    $('.pre-b-city').html('<strong>Billing State: </strong>' + state_b);
                    $('.pre-b-state').html('<strong>Billing Zipcode: </strong>' + zip_code_b);
                    $('.pre-b-zipcode').html('<strong>Billing City: </strong>' + city_b);

                }


            });

            $('.billing-address').keyup(function (e) {
                $(this).closest('form-group').removeClass('has-error');

            });


            $('.uploadFile').click(function (e) {

                e.preventDefault(e);
                var ajaxUrl = '<?php echo admin_url("admin-ajax.php"); ?>';


                var file = $('#artwork_file');
                var ext = file.val().match(/\.(.+)$/)[1];
                switch (ext) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'gif':
                    case 'tif':
                    case 'pdf':
                    case 'doc':
                    case 'docx':
                    case 'eps':
                    case 'pub':
                    case 'bpm':
                    case 'png':
                    case 'pptx':
                    case 'ppt':

                        $('.modal-attach').block({
                            message: '<h1>Just a moment..</h1>',
                            css: {border: '3px solid #a00'}
                        });
                        var fd = new FormData();
                        var file = $('#artwork_file');
                        var individual_file = file[0].files[0];
                        fd.append("artwork_file", individual_file);
                        fd.append('action', 'getUploadFile');

                        $.ajax({
                            type: 'POST',
                            url: ajaxUrl,
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success == true) {
                                    $('#artwork_uploaded').val(response.message.url);
                                    $('.modal-attach').unblock();
                                    $('#Browse-id').modal('hide');
                                    $('.file_attached').html('File Attached');
                                    sweetAlert("Art Work", 'File Attached', "success");

                                } else {
                                    $('.modal-attach').unblock();
                                    sweetAlert("Error...", data.message, "error");
                                }
                            }
                        });

                        break;
                    default:
                        sweetAlert("Error Accured", "The file type that you've uploaded is not a allowed.", "error");
                        $(this).val() = '';
                }


            });


        });
    </script>
<?php endif ?>
</body>
