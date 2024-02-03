<?php

defined('ABSPATH') || exit;

$notes = $order->get_customer_order_notes();

?>

<div class="st-package-information">
    <div class="stp-header display-flex justify-content-sp-bt mb-sm">
        <h3>
            <?php esc_html_e('Package Information', 'shipment-tracker'); ?>
        </h3>
        <div class="stp-tracking-number">
            <p>
                <?php esc_html_e('Tracking Number', 'shipment-tracker'); ?>
            </p>
            <span>ECR140962762901243</span>
        </div>
    </div>
    <div class="stp-body">
        <div class="stp-order-details display-flex justify-content-sp-bt">
            <div class="stp-order-creation">
                <p>Order Creation</p>
                <span>January 29 2024</span>
            </div>
            <div class="stp-order-elapsed">
                <span>10 Hours</span>
            </div>
            <div class="stp-delivery-type">
                <span>Standard</span>
            </div>
        </div>
        <div class="stp-company-details">
            Company Details
        </div>
        <div class="stp-shipment-details">
            <div class="container py-5">
                <div class="row">

                    <div class="col-md-12 col-lg-12">
                        <div id="tracking-pre"></div>
                        <div id="tracking">
                            <div class="tracking-list">
                                <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                            data-prefix="fas" data-icon="circle" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed" /></div>
                                    <div class="tracking-content">Order Placed<span>09 Aug 2021, 10:00am</span></div>
                                </div>
                                <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                            data-prefix="fas" data-icon="circle" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed" /></div>
                                    <div class="tracking-content">Order Confirmed<span>09 Aug 2021, 10:30am</span></div>
                                </div>
                                <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                            data-prefix="fas" data-icon="circle" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed" /></div>
                                    <div class="tracking-content">Packed the product<span>09 Aug 2021, 12:00pm</span>
                                    </div>
                                </div>
                                <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                            data-prefix="fas" data-icon="circle" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed" /></div>
                                    <div class="tracking-content">Arrived in the warehouse<span>10 Aug 2021,
                                            02:00pm</span></div>
                                </div>
                                <div class="tracking-item">
                                    <div class="tracking-icon status-current blinker">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                            data-prefix="fas" data-icon="circle" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed" /></div>
                                    <div class="tracking-content">Near by Courier facility<span>10 Aug 2021,
                                            03:00pm</span></div>
                                </div>

                                <div class="tracking-item-pending">
                                    <div class="tracking-icon status-intransit">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                            data-prefix="fas" data-icon="circle" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed" /></div>
                                    <div class="tracking-content">Out for Delivery<span>12 Aug 2021, 05:00pm</span>
                                    </div>
                                </div>
                                <div class="tracking-item-pending">
                                    <div class="tracking-icon status-intransit">
                                        <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                            data-prefix="fas" data-icon="circle" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="tracking-date"><img
                                            src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                            class="img-responsive" alt="order-placed" /></div>
                                    <div class="tracking-content">Delivered<span>12 Aug 2021, 09:00pm</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stp-footer">
        <p>@copyright Upsidedown Technologies</p>
    </div>
</div>