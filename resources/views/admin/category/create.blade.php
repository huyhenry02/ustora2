@extends('admin.layout.main')
@section('content')
    <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

        <div id="customer_details" class="col-3-set">
            <div class="col-3">
                <div class="woocommerce-billing-fields">
                    <h3>Submit Product</h3>
                    <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                        <label class="" for="billing_country">Category <abbr title="required" class="required">*</abbr>
                        </label>
                        <select class="country_to_state country_select" id="billing_country" name="billing_country">

                            <option value="WF">Laptop</option>
                            <option value="EH">Phone</option>
                            <option value="WS">Ti vi</option>

                        </select>
                    </p>

                    <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                        <label class="" for="billing_first_name">Product name <abbr title="required" class="required">*</abbr>
                        </label>
                        <input type="text" value="" placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                    </p>

                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                        <label class="" for="billing_last_name">Price <abbr title="required" class="required">*</abbr>
                        </label>
                        <input type="text" value="" placeholder="" id="billing_last_name" name="billing_last_name" class="input-text ">
                    </p>
                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                        <label class="" for="billing_last_name">Image <abbr title="required" class="required">*</abbr>
                        </label>
                        <input type="file" value="" placeholder="" id="billing_last_name" name="billing_last_name" class="input-text ">
                    </p>
                    <div class="clear"></div>

                    <div class="clear"></div>


                    <div class="create-account">
                        <p>To complete the product addition, please enter the administrator's password</p>
                        <p id="account_password_field" class="form-row validate-required">
                            <label class="" for="account_password">Account password <abbr title="required" class="required">*</abbr>
                            </label>
                            <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text">
                        </p>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>



        </div>




    </form>

@endsection
