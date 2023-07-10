@extends('dashboard.layout.app')

{{-- custom stylesheet --}}
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dashboard/role.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

{{-- BEGIN:: Role Add Content --}}
@section('content')
    <div class="create-role-content-wrapper mb-5">
        <!-- heading content wrapper -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Role</h1>
        </div>
        <form id="role-form" action="{{ url('dashboard/roles/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- general information -->
            <div class="general-info-wrapper">
                <p>General Information</p>
                <div class="form-row align-items-end">
                    <!-- role name -->
                    <div class="form-group col-md-4">
                        <label for="name">Role Name</label>
                        <input type="text" minlength="2" maxlength="30" id="name" name="name" class="form-control" required>
                    </div>
                    <!-- assign all permissions button -->
                    <div class="form-group col-md-4 col-4">
                        <button id="assign-all-permissions-btn" class="btn btn-outline-warning">Assign All Permissions</button>
                    </div>
                </div>
                <!-- permissions module wrapper -->
                <table class="table table-bordered permission-table-wrapper">
                    <thead>
                        <tr>
                            <th rowspan="2">Module Name</th>
                            <th colspan="5">Permissions</th>
                        </tr>
                        <tr>
                            <th>Veiw</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>Miscellaneous</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> <!-- POS -->
                            <td style="width: 12em;">POS</td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-pos" name="permissionsCheckbox[]" class="custom-control-input" value="create pos">
                                    <label class="custom-control-label" for="create-pos"></label>
                                </div>
                            </td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-pos-receipt-invoice-settings-history" name="permissionsCheckbox[]" class="custom-control-input" value="view pos_receipt_invoice_settings_history">
                                    <label class="custom-control-label" for="view-pos-receipt-invoice-settings-history">Receipt Invoice Settings History</label>
                                </div>
                                <div class="w-100"></div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- print bill with receipt -->
                                    <input type="checkbox" id="edit-is-print-bill-with-receipt" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_print_bill_with_receipt">
                                    <label class="custom-control-label" for="edit-is-print-bill-with-receipt">Edit Is Print Bill With Receipt</label>
                                </div>
                                <div class="w-100"></div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- print with extra product variants -->
                                    <input type="checkbox" id="edit-is-print-with-product-variants" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_print_with_product_variants">
                                    <label class="custom-control-label" for="edit-is-print-with-product-variants">Edit Is Print With Extra Product Variants</label>
                                </div>
                                <div class="w-100"></div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- edit show bill contact -->
                                    <input type="checkbox" id="edit-is-show-bill-contact" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_show_bill_contact">
                                    <label class="custom-control-label" for="edit-is-show-bill-contact">Edit [ Show/Hide ] Bill Contact</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- edit show receipt contact -->
                                    <input type="checkbox" id="edit-is-show-receipt-contact" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_show_receipt_contact">
                                    <label class="custom-control-label" for="edit-is-show-receipt-contact">Edit [ Show/Hide ] Receipt Contact</label>
                                </div>
                                <div class="w-100"></div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- edit show bill opening hours -->
                                    <input type="checkbox" id="edit-is-show-bill-opening-hours" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_show_bill_opening_hours">
                                    <label class="custom-control-label" for="edit-is-show-bill-opening-hours">Edit [ Show/Hide ] Bill Opening Hours</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- edit show receipt opening hours -->
                                    <input type="checkbox" id="edit-is-show-receipt-opening-hours" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_show_receipt_opening_hours">
                                    <label class="custom-control-label" for="edit-is-show-receipt-opening-hours">Edit [ Show/Hide ] Receipt Opening Hours</label>
                                </div>
                                <div class="w-100"></div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- edit show bill address -->
                                    <input type="checkbox" id="edit-is-show-bill-address" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_show_bill_address">
                                    <label class="custom-control-label" for="edit-is-show-bill-address">Edit [ Show/Hide ] Bill Address</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- edit show receipt address -->
                                    <input type="checkbox" id="edit-is-show-receipt-address" name="permissionsCheckbox[]" class="custom-control-input" value="edit is_show_receipt_address">
                                    <label class="custom-control-label" for="edit-is-show-receipt-address">Edit [ Show/Hide ] Receipt Address</label>
                                </div>
                                <div class="w-100"></div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- edit bill footer detail -->
                                    <input type="checkbox" id="edit-bill-footer-detail" name="permissionsCheckbox[]" class="custom-control-input" value="edit bill_footer_detail">
                                    <label class="custom-control-label" for="edit-bill-footer-detail">Edit Bill Footer Detail</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- edit receipt footer detail -->
                                    <input type="checkbox" id="edit-receipt-footer-detail" name="permissionsCheckbox[]" class="custom-control-input" value="edit receipt_footer_detail">
                                    <label class="custom-control-label" for="edit-receipt-footer-detail">Edit Receipt Footer Detail</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- DASHBOARD ACCESS -->
                            <td style="width: 12em;">Dashboard Access</td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="access-dashboard" name="permissionsCheckbox[]" class="custom-control-input" value="access dashboard">
                                    <label class="custom-control-label" for="access-dashboard"></label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Product -->
                            <td>Product</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-product" name="permissionsCheckbox[]" class="custom-control-input" value="view product">
                                    <label class="custom-control-label" for="view-product"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-product" name="permissionsCheckbox[]" class="custom-control-input" value="create product">
                                    <label class="custom-control-label" for="create-product"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-product" name="permissionsCheckbox[]" class="custom-control-input" value="edit product">
                                    <label class="custom-control-label" for="edit-product"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-product" name="permissionsCheckbox[]" class="custom-control-input" value="delete product">
                                    <label class="custom-control-label" for="delete-product"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-product-history" name="permissionsCheckbox[]" class="custom-control-input" value="view product_history">
                                    <label class="custom-control-label" for="view-product-history">History</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- detail -->
                                    <input type="checkbox" id="detail-product" name="permissionsCheckbox[]" class="custom-control-input" value="detail product">
                                    <label class="custom-control-label" for="detail-product">Detail</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Product variant -->
                            <td>Product Variants</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-product_variant" name="permissionsCheckbox[]" class="custom-control-input" value="view product_variant">
                                    <label class="custom-control-label" for="view-product_variant"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-product_variant" name="permissionsCheckbox[]" class="custom-control-input" value="create product_variant">
                                    <label class="custom-control-label" for="create-product_variant"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-product_variant" name="permissionsCheckbox[]" class="custom-control-input" value="edit product_variant">
                                    <label class="custom-control-label" for="edit-product_variant"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-product_variant" name="permissionsCheckbox[]" class="custom-control-input" value="delete product_variant">
                                    <label class="custom-control-label" for="delete-product_variant"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-product_variant-history" name="permissionsCheckbox[]" class="custom-control-input" value="view product_variant_history">
                                    <label class="custom-control-label" for="view-product_variant-history">History</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- detail -->
                                    <input type="checkbox" id="detail-product_variant" name="permissionsCheckbox[]" class="custom-control-input" value="detail product_variant">
                                    <label class="custom-control-label" for="detail-product_variant">Detail</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Order -->
                            <td>Orders</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-order" name="permissionsCheckbox[]" class="custom-control-input" value="view order">
                                    <label class="custom-control-label" for="view-order"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-order" name="permissionsCheckbox[]" class="custom-control-input" value="delete order">
                                    <label class="custom-control-label" for="delete-order"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- detail -->
                                    <input type="checkbox" id="detail-order" name="permissionsCheckbox[]" class="custom-control-input" value="detail order">
                                    <label class="custom-control-label" for="detail-order">Detail</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- confirm sales -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="confirm sales" id="confirm-sales">
                                    <label class="custom-control-label" for="confirm-sales">Confirmed</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- cancel sales -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="cancel sales" id="cancel-sales">
                                    <label class="custom-control-label" for="cancel-sales">Cancel</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- download invoice -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="download_pdf sales" id="download-pdf-sales">
                                    <label class="custom-control-label" for="download-pdf-sales">Download Invoice</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- download packing -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="download_packing sales" id="download_packing_sales">
                                    <label class="custom-control-label" for="download_packing_sales">Download Packing</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- download delivery noted-->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="download_delivery_noted sales" id="download_delivery_noted_sales">
                                    <label class="custom-control-label" for="download_delivery_noted_sales">Download Delivery Noted</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- print receipt -->
                                    <input type="checkbox" id="print-order-receipt" name="permissionsCheckbox[]" class="custom-control-input" value="print order_receipt">
                                    <label class="custom-control-label" for="print-order-receipt">Print Receipt</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- miscellaneous charge -->
                                    <input type="checkbox" id="create-miscellaneous-charge" name="permissionsCheckbox[]" class="custom-control-input" value="create miscellaneous_charge">
                                    <label class="custom-control-label" for="create-miscellaneous-charge">Create Miscellaneous Charge</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- delivery charge options -->
                                    <input type="checkbox" id="create-delivery-charge-options" name="permissionsCheckbox[]" class="custom-control-input" value="create delivery_charge_options">
                                    <label class="custom-control-label" for="create-delivery-charge-options">Create Delivery Charge Options</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Payment Of Sale -->
                            <td>Sales Payment</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="view sales_payment_options" id="view-sales-payment-options">
                                    <label class="custom-control-label" for="view-sales-payment-options"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="create sales_payment_options" id="create-sales-payment-options">
                                    <label class="custom-control-label" for="create-sales-payment-options"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="update sales_payment_options" id="update-sales-payment-options">
                                    <label class="custom-control-label" for="update-sales-payment-options"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="delete sales_payment_options" id="delete-sales-payment-options">
                                    <label class="custom-control-label" for="delete-sales-payment-options"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="view sales_payment_history" id="view-sales-payment-history">
                                    <label class="custom-control-label" for="view-sales-payment-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Sales Return -->
                            <td>Sales Return</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="view sales_return" id="view-sales_return">
                                    <label class="custom-control-label" for="view-sales_return"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="create sales_return" id="create-sales_return">
                                    <label class="custom-control-label" for="create-sales_return"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="edit sales_return" id="edit-sales_return">
                                    <label class="custom-control-label" for="edit-sales_return"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="delete sales_return" id="delete-sales_return">
                                    <label class="custom-control-label" for="delete-sales_return"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="view sales_return_history" id="view-sales_return-history">
                                    <label class="custom-control-label" for="view-sales_return-history">History</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- detail -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="detail sales_return" id="detail-sales_return">
                                    <label class="custom-control-label" for="detail-sales_return">Details</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Temporary Order -->
                            <td>Held Orders</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-temporary-order" name="permissionsCheckbox[]" class="custom-control-input" value="view temporary_order">
                                    <label class="custom-control-label" for="view-temporary-order"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-temporary-order" name="permissionsCheckbox[]" class="custom-control-input" value="create temporary_order">
                                    <label class="custom-control-label" for="create-temporary-order"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-temporary-order" name="permissionsCheckbox[]" class="custom-control-input" value="delete temporary_order">
                                    <label class="custom-control-label" for="delete-temporary-order"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- detail -->
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Stock -->
                            <td>Stock</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-stock" name="permissionsCheckbox[]" class="custom-control-input" value="view stock">
                                    <label class="custom-control-label" for="view-stock"></label>
                                </div>
                            </td>  
                        </tr>
                        <tr> <!-- Shop -->
                            <td>Shop</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-shop" name="permissionsCheckbox[]" class="custom-control-input" value="view shop">
                                    <label class="custom-control-label" for="view-shop"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-shop" name="permissionsCheckbox[]" class="custom-control-input" value="create shop">
                                    <label class="custom-control-label" for="create-shop"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-shop" name="permissionsCheckbox[]" class="custom-control-input" value="edit shop">
                                    <label class="custom-control-label" for="edit-shop"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-shop" name="permissionsCheckbox[]" class="custom-control-input" value="delete shop">
                                    <label class="custom-control-label" for="delete-shop"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-shop-history" name="permissionsCheckbox[]" class="custom-control-input" value="view shop_history">
                                    <label class="custom-control-label" for="view-shop-history">History</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- detail -->
                                    <input type="checkbox" id="detail-shop" name="permissionsCheckbox[]" class="custom-control-input" value="detail shop">
                                    <label class="custom-control-label" for="detail-shop">Detail</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Size -->
                            <td>Size</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-size" name="permissionsCheckbox[]" class="custom-control-input" value="view size">
                                    <label class="custom-control-label" for="view-size"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-size" name="permissionsCheckbox[]" class="custom-control-input" value="create size">
                                    <label class="custom-control-label" for="create-size"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-size" name="permissionsCheckbox[]" class="custom-control-input" value="edit size">
                                    <label class="custom-control-label" for="edit-size"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-size" name="permissionsCheckbox[]" class="custom-control-input" value="delete size">
                                    <label class="custom-control-label" for="delete-size"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-size-history" name="permissionsCheckbox[]" class="custom-control-input" value="view size_history">
                                    <label class="custom-control-label" for="view-size-history">History</label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox"> <!-- detail -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="detail size" id="detail-size">
                                    <label class="custom-control-label" for="detail-size">Detail</label>
                                </div> --}}
                            </td>
                        </tr>
                        <tr> <!-- Color -->
                            <td>Color</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-color" name="permissionsCheckbox[]" class="custom-control-input" value="view color">
                                    <label class="custom-control-label" for="view-color"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-color" name="permissionsCheckbox[]" class="custom-control-input" value="create color">
                                    <label class="custom-control-label" for="create-color"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-color" name="permissionsCheckbox[]" class="custom-control-input" value="edit color">
                                    <label class="custom-control-label" for="edit-color"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-color" name="permissionsCheckbox[]" class="custom-control-input" value="delete color">
                                    <label class="custom-control-label" for="delete-color"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-color-history" name="permissionsCheckbox[]" class="custom-control-input" value="view color_history">
                                    <label class="custom-control-label" for="view-color-history">History</label>
                                </div>
                                {{-- <div class="custom-control custom-checkbox"> <!-- detail -->
                                    <input type="checkbox" class="custom-control-input" name="permissionsCheckbox[]" value="detail color" id="detail-color">
                                    <label class="custom-control-label" for="detail-color">Detail</label>
                                </div> --}}
                            </td>
                        </tr>
                        <tr> <!-- Type -->
                            <td>Type</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-type" name="permissionsCheckbox[]" class="custom-control-input" value="view type">
                                    <label class="custom-control-label" for="view-type"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-type" name="permissionsCheckbox[]" class="custom-control-input" value="create type">
                                    <label class="custom-control-label" for="create-type"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-type" name="permissionsCheckbox[]" class="custom-control-input" value="edit type">
                                    <label class="custom-control-label" for="edit-type"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-type" name="permissionsCheckbox[]" class="custom-control-input" value="delete type">
                                    <label class="custom-control-label" for="delete-type"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-type-history" name="permissionsCheckbox[]" class="custom-control-input" value="view color_history">
                                    <label class="custom-control-label" for="view-type-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Customer -->
                            <td>Customer</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-customer" name="permissionsCheckbox[]" class="custom-control-input" value="view customer">
                                    <label class="custom-control-label" for="view-customer"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-customer" name="permissionsCheckbox[]" class="custom-control-input" value="create customer">
                                    <label class="custom-control-label" for="create-customer"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-customer" name="permissionsCheckbox[]" class="custom-control-input" value="edit customer">
                                    <label class="custom-control-label" for="edit-customer"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-customer" name="permissionsCheckbox[]" class="custom-control-input" value="delete customer">
                                    <label class="custom-control-label" for="delete-customer"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-customer-history" name="permissionsCheckbox[]" class="custom-control-input" value="view customer_history">
                                    <label class="custom-control-label" for="view-customer-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Report -->
                            <td>Report</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-report" name="permissionsCheckbox[]" class="custom-control-input" value="view report">
                                    <label class="custom-control-label" for="view-report"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox"></div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox"></div>
                            </td>
                            <td class="text-center"> <!-- delete --></td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-report-history" name="permissionsCheckbox[]" class="custom-control-input" value="view report_history">
                                    <label class="custom-control-label" for="view-report-history">History</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- detail -->
                                    <input type="checkbox" id="detail-report" name="permissionsCheckbox[]" class="custom-control-input" value="detail report">
                                    <label class="custom-control-label" for="detail-report">Detail</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- filter -->
                                    <input type="checkbox" id="filter-report" name="permissionsCheckbox[]" class="custom-control-input" value="filter report">
                                    <label class="custom-control-label" for="filter-report">Filter</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- download pdf -->
                                    <input type="checkbox" id="download-pdf-report" name="permissionsCheckbox[]" class="custom-control-input" value="download pdf report">
                                    <label class="custom-control-label" for="download-pdf-report">Download PDF</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Category -->
                            <td>Category</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-category" name="permissionsCheckbox[]" class="custom-control-input" value="view category">
                                    <label class="custom-control-label" for="view-category"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-category" name="permissionsCheckbox[]" class="custom-control-input" value="create category">
                                    <label class="custom-control-label" for="create-category"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-category" name="permissionsCheckbox[]" class="custom-control-input" value="edit category">
                                    <label class="custom-control-label" for="edit-category"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-category" name="permissionsCheckbox[]" class="custom-control-input" value="delete category">
                                    <label class="custom-control-label" for="delete-category"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-category-history" name="permissionsCheckbox[]" class="custom-control-input" value="view category_history">
                                    <label class="custom-control-label" for="view-category-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Sub Category -->
                            <td>Sub Category</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-subcategory" name="permissionsCheckbox[]" class="custom-control-input" value="view subcategory">
                                    <label class="custom-control-label" for="view-subcategory"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-subcategory" name="permissionsCheckbox[]" class="custom-control-input" value="create subcategory">
                                    <label class="custom-control-label" for="create-subcategory"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-subcategory" name="permissionsCheckbox[]" class="custom-control-input" value="edit subcategory">
                                    <label class="custom-control-label" for="edit-subcategory"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-subcategory" name="permissionsCheckbox[]" class="custom-control-input" value="delete subcategory">
                                    <label class="custom-control-label" for="delete-subcategory"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-subcategory-history" name="permissionsCheckbox[]" class="custom-control-input" value="view subcategory_history">
                                    <label class="custom-control-label" for="view-subcategory-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Customer Group -->
                            <td>Customer Group</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-customer-group" name="permissionsCheckbox[]" class="custom-control-input" value="view customer_group">
                                    <label class="custom-control-label" for="view-customer-group"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-customer-group" name="permissionsCheckbox[]" class="custom-control-input" value="create customer_group">
                                    <label class="custom-control-label" for="create-customer-group"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-customer-group" name="permissionsCheckbox[]" class="custom-control-input" value="edit customer_group">
                                    <label class="custom-control-label" for="edit-customer-group"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-customer-group" name="permissionsCheckbox[]" class="custom-control-input" value="delete customer_group">
                                    <label class="custom-control-label" for="delete-customer-group"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-customer-group-history" name="permissionsCheckbox[]" class="custom-control-input" value="view customer_group_history">
                                    <label class="custom-control-label" for="view-customer-group-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Notification -->
                            <td>Notification</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-notification" name="permissionsCheckbox[]" class="custom-control-input" value="view notification">
                                    <label class="custom-control-label" for="view-notification"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-notification" name="permissionsCheckbox[]" class="custom-control-input" value="edit notification">
                                    <label class="custom-control-label" for="edit-notification"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                            </td>
                            <td> <!-- miscellaneous -->
                            </td>
                        </tr>
                        <tr> <!-- District -->
                            <td>District</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-district" name="permissionsCheckbox[]" class="custom-control-input" value="view district">
                                    <label class="custom-control-label" for="view-district"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-district" name="permissionsCheckbox[]" class="custom-control-input" value="create district">
                                    <label class="custom-control-label" for="create-district"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-district" name="permissionsCheckbox[]" class="custom-control-input" value="edit district">
                                    <label class="custom-control-label" for="edit-district"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-district" name="permissionsCheckbox[]" class="custom-control-input" value="delete district">
                                    <label class="custom-control-label" for="delete-district"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-district-history" name="permissionsCheckbox[]" class="custom-control-input" value="view district_history">
                                    <label class="custom-control-label" for="view-district-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Sangkat -->
                            <td>Sangkat</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-sangkat" name="permissionsCheckbox[]" class="custom-control-input" value="view sangkat">
                                    <label class="custom-control-label" for="view-sangkat"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-sangkat" name="permissionsCheckbox[]" class="custom-control-input" value="create sangkat">
                                    <label class="custom-control-label" for="create-sangkat"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-sangkat" name="permissionsCheckbox[]" class="custom-control-input" value="edit sangkat">
                                    <label class="custom-control-label" for="edit-sangkat"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-sangkat" name="permissionsCheckbox[]" class="custom-control-input" value="delete sangkat">
                                    <label class="custom-control-label" for="delete-sangkat"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-sangkat-history" name="permissionsCheckbox[]" class="custom-control-input" value="view sangkat_history">
                                    <label class="custom-control-label" for="view-sangkat-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- System User -->
                            <td>System User</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-system-user" name="permissionsCheckbox[]" class="custom-control-input" value="view system_user">
                                    <label class="custom-control-label" for="view-system-user"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-system-user" name="permissionsCheckbox[]" class="custom-control-input" value="create system_user">
                                    <label class="custom-control-label" for="create-system-user"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-system-user" name="permissionsCheckbox[]" class="custom-control-input" value="edit system_user">
                                    <label class="custom-control-label" for="edit-system-user"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-system-user" name="permissionsCheckbox[]" class="custom-control-input" value="delete system_user">
                                    <label class="custom-control-label" for="delete-system-user"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-system-user-history" name="permissionsCheckbox[]" class="custom-control-input" value="view system_user_history">
                                    <label class="custom-control-label" for="view-system-user-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Role -->
                            <td>Role</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-role" name="permissionsCheckbox[]" class="custom-control-input" value="view role">
                                    <label class="custom-control-label" for="view-role"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-role" name="permissionsCheckbox[]" class="custom-control-input" value="create role">
                                    <label class="custom-control-label" for="create-role"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-role" name="permissionsCheckbox[]" class="custom-control-input" value="edit role">
                                    <label class="custom-control-label" for="edit-role"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-role" name="permissionsCheckbox[]" class="custom-control-input" value="delete role">
                                    <label class="custom-control-label" for="delete-role"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-role-history" name="permissionsCheckbox[]" class="custom-control-input" value="view role_history">
                                    <label class="custom-control-label" for="view-role-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Cash Register -->
                            <td>Cash Register</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-cash-register" name="permissionsCheckbox[]" class="custom-control-input" value="view cash_register">
                                    <label class="custom-control-label" for="view-cash-register"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-cash-register" name="permissionsCheckbox[]" class="custom-control-input" value="create cash_register">
                                    <label class="custom-control-label" for="create-cash-register"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-cash-register" name="permissionsCheckbox[]" class="custom-control-input" value="edit cash_register">
                                    <label class="custom-control-label" for="edit-cash-register"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-cash-register" name="permissionsCheckbox[]" class="custom-control-input" value="delete cash_register">
                                    <label class="custom-control-label" for="delete-cash-register"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-cash-register-history" name="permissionsCheckbox[]" class="custom-control-input" value="view cash_register_history">
                                    <label class="custom-control-label" for="view-cash-register-history">History</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- detail -->
                                    <input type="checkbox" id="detail-cash-register" name="permissionsCheckbox[]" class="custom-control-input" value="detail cash_register">
                                    <label class="custom-control-label" for="detail-cash-register">Detail</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- view cash register setting -->
                                    <input type="checkbox" id="view-cash-register-setting" name="permissionsCheckbox[]" class="custom-control-input" value="view cash_register_setting">
                                    <label class="custom-control-label" for="view-cash-register-setting">View Cash Setting</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-2"> <!-- open cash -->
                                    <input type="checkbox" id="open-cash-register" name="permissionsCheckbox[]" class="custom-control-input" value="open cash_register">
                                    <label class="custom-control-label" for="open-cash-register">Open Cash</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- close cash -->
                                    <input type="checkbox" id="close-cash-register" name="permissionsCheckbox[]" class="custom-control-input" value="close cash_register">
                                    <label class="custom-control-label" for="close-cash-register">Close Cash</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Work Shift -->
                            <td>Work Shift</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-shift" name="permissionsCheckbox[]" class="custom-control-input" value="view shift">
                                    <label class="custom-control-label" for="view-shift"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                            </td>
                            <td class="text-center"> <!-- edit -->
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-shift" name="permissionsCheckbox[]" class="custom-control-input" value="delete shift">
                                    <label class="custom-control-label" for="delete-shift"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-shift-history" name="permissionsCheckbox[]" class="custom-control-input" value="view shift_history">
                                    <label class="custom-control-label" for="view-shift-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Bank Account Settings -->
                            <td>Bank Account Settings</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-account" name="permissionsCheckbox[]" class="custom-control-input" value="view account">
                                    <label class="custom-control-label" for="view-account"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-account" name="permissionsCheckbox[]" class="custom-control-input" value="create account">
                                    <label class="custom-control-label" for="create-account"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-account" name="permissionsCheckbox[]" class="custom-control-input" value="edit account">
                                    <label class="custom-control-label" for="edit-account"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-account" name="permissionsCheckbox[]" class="custom-control-input" value="delete account">
                                    <label class="custom-control-label" for="delete-account"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap border-0"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox" style="margin-top: .7rem;"> <!-- history -->
                                    <input type="checkbox" id="view-account-history" name="permissionsCheckbox[]" class="custom-control-input" value="view account_history">
                                    <label class="custom-control-label" for="view-account-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Dashboard Icon -->
                            <td>Dashboard Icon</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-dashboard-icons" name="permissionsCheckbox[]" class="custom-control-input" value="view dashboard_icons">
                                    <label class="custom-control-label" for="view-dashboard-icons"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-dashboard-icons" name="permissionsCheckbox[]" class="custom-control-input" value="edit dashboard_icons">
                                    <label class="custom-control-label" for="edit-dashboard-icons"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox"> <!-- history -->
                                    <input type="checkbox" id="view-dashboard-icons-history" name="permissionsCheckbox[]" class="custom-control-input" value="view dashboard_icons_history">
                                    <label class="custom-control-label" for="view-dashboard-icons-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Dashboard / Company Name -->
                            <td>Dashboard / Company Name</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-company-name" name="permissionsCheckbox[]" class="custom-control-input" value="view company_name">
                                    <label class="custom-control-label" for="view-company-name"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-company-name" name="permissionsCheckbox[]" class="custom-control-input" value="edit company_name">
                                    <label class="custom-control-label" for="edit-company-name"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                            </td>
                            <td class="d-flex flex-row flex-wrap border-0"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox" style="margin-top: .7rem;"> <!-- history -->
                                    <input type="checkbox" id="view-company-name-history" name="permissionsCheckbox[]" class="custom-control-input" value="view company_name_history">
                                    <label class="custom-control-label" for="view-company-name-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Web Applicatoin Favicon -->
                            <td>Web Application Favicon</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-web-app-favicon" name="permissionsCheckbox[]" class="custom-control-input" value="view web_app_favicon">
                                    <label class="custom-control-label" for="view-web-app-favicon"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-web-app-favicon" name="permissionsCheckbox[]" class="custom-control-input" value="edit web_app_favicon">
                                    <label class="custom-control-label" for="edit-web-app-favicon"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                            </td>
                            <td class="d-flex flex-row flex-wrap border-0"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox" style="margin-top: .7rem;"> <!-- history -->
                                    <input type="checkbox" id="view-web-app-favicon-history" name="permissionsCheckbox[]" class="custom-control-input" value="view web_app_favicon_history">
                                    <label class="custom-control-label" for="view-web-app-favicon-history">History</label>
                                </div>
                            </td>
                        </tr>
                        <tr> <!-- Exchange Rate -->
                            <td>Exchange Rate</td>
                            <td class="text-center"> <!-- view -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="view-exchange-rate" name="permissionsCheckbox[]" class="custom-control-input" value="view exchange_rate">
                                    <label class="custom-control-label" for="view-exchange-rate"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- create -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="create-exchange-rate" name="permissionsCheckbox[]" class="custom-control-input" value="create exchange_rate">
                                    <label class="custom-control-label" for="create-exchange-rate"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- edit -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="edit-exchange-rate" name="permissionsCheckbox[]" class="custom-control-input" value="edit exchange_rate">
                                    <label class="custom-control-label" for="edit-exchange-rate"></label>
                                </div>
                            </td>
                            <td class="text-center"> <!-- delete -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="delete-exchange-rate" name="permissionsCheckbox[]" class="custom-control-input" value="delete exchange_rate">
                                    <label class="custom-control-label" for="delete-exchange-rate"></label>
                                </div>
                            </td>
                            <td class="d-flex flex-row flex-wrap"> <!-- miscellaneous -->
                                <div class="custom-control custom-checkbox mr-2"> <!-- history -->
                                    <input type="checkbox" id="view-exchange-rate-history" name="permissionsCheckbox[]" class="custom-control-input" value="view exchange_rate_history">
                                    <label class="custom-control-label" for="view-exchange-rate-history">History</label>
                                </div>
                                <div class="custom-control custom-checkbox"> <!-- detail -->
                                    <input type="checkbox" id="detail-exchange-rate" name="permissionsCheckbox[]" class="custom-control-input" value="detail exchange_rate">
                                    <label class="custom-control-label" for="detail-exchange-rate">Detail</label>
                                </div>
                            </td>
                        </tr>
                        <!--  -->
                    </tbody>
                </table>
            </div>
            <!-- add and reset buttons -->
            <div class="sales-btn-wrapper form-row mt-4">
                <input type="submit" class="btn btn-sm btn-outline-success mr-2" value="Register Role">
                <button id="role-reset-btn" class="btn btn-sm btn-outline-danger cursor-pointer">Reset Fields</button>
            </div>
        </form>
    </div>
@endsection
{{-- END:: Role Add Content --}}

{{-- custom script --}}
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script src="{{ asset('js/dashboard/role.js') }}"></script>

    <script>
        $(document).ready(function(){
            validAddnEditRole();
        });
    </script>
@endsection
