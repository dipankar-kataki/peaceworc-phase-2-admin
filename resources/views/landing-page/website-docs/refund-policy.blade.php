@extends('welcome')
@section('page-title', 'Refund Policy')
@section('custom-css')
    <style>
        .refund-header {
            border-bottom: 1px dashed #bbb9b9;
            margin-top:20px;
        }
        .refund-points{
            padding-left:15px;
        }
        .refund-points li{
            list-style-type:decimal-leading-zero;
            margin-bottom:10px;
        }

        .refund-points-inner li{
            list-style-type: lower-alpha;        
        }
    </style>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body container">
                    <div class="text-center refund-header">
                        <h4>Refund Policy</h4>
                    </div>
                    <form>
                        <div class="form-group">
                            <label class="mt-4">Effective Date - (dd-mm-yyyy) :</label>
                            <div class="col-md-3" style="padding-left:0px;">
                                <input class="form-control" type="date" value="2023-10-02">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""> Policy Outline</label>
                            <textarea class="form-control" name="refund_policy_outline" id="" cols="2" rows="2">This Refund Policy outlines the terms and conditions for requesting refunds for services provided through the PEACEWORC mobile application (the "App").</textarea>
                        </div>
                        <ol class="refund-points">
                            <li>
                                <label for="">Refund Eligibility</label>
                                <ol class="refund-points-inner">
                                    <li>
                                        <label for="">Service Fee</label>
                                        <textarea class="form-control" name="service_fee" id="" cols="2" rows="2">This Refund Policy outlines the terms and conditions for requesting refunds for services provided through the PEACEWORC mobile application (the "App").</textarea>
                                    </li>
                                    <li>
                                        <label for="">Services Delivered</label>
                                        <textarea class="form-control" name="service_delivered" id="" cols="2" rows="2">Once services have been delivered by professional agencies or caregivers through the App, service fees are considered non-refundable.</textarea>
                                    </li>
                                    <li>
                                        <label for="">Booking Cancellations</label>
                                        <textarea class="form-control" name="booking_cancellation" id="" cols="2" rows="2">If a user cancels a booking, refund eligibility may vary depending on the specific circumstances and the cancellation policy in place.</textarea>
                                    </li>
                                    <li>
                                        <label for="">Disputed Payments</label>
                                        <textarea class="form-control" name="dispute_payment" id="" cols="2" rows="2">In cases of payment disputes, such as disagreements regarding the quality or completion of services, both users and professional agencies or caregivers are encouraged to resolve the issue through the dispute resolution process within the App. Refunds may be issued at our discretion based on the outcome of the dispute resolution process.</textarea>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <label for="">How to Request a Refund</label>
                                <ol class="refund-points-inner">
                                    <li>
                                        <label for="">Service Fee</label>
                                        <textarea class="form-control" name="request_refund_service_fee" id="" cols="2" rows="2">If you believe you are eligible for a refund of service fees, you can request a refund through the App's customer support. Please provide detailed information regarding the reason for the refund request, including relevant dates and transaction details.</textarea>
                                    </li>
                                    <li>
                                        <label for="">Disputed Payments</label>
                                        <textarea class="form-control" name="request_refund_dispute_payment" id="" cols="2" rows="2">To request a refund related to a payment dispute, please follow the dispute resolution process within the App. Our team will review the case, and if a refund is warranted, it will be processed accordingly.</textarea>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <label for="">Refund Processing</label>
                                <ol class="refund-points-inner">
                                    <li>
                                        <label for="">Timelines</label>
                                        <textarea class="form-control" name="timelines" id="" cols="2" rows="2">Refunds, when applicable, will be processed as promptly as possible. However, the processing time may vary depending on the payment method used and the specific circumstances of the refund.</textarea>
                                    </li>
                                    <li>
                                        <label for="">Payment Method</label>
                                        <textarea class="form-control" name="payment_method" id="" cols="2" rows="2">Refunds will typically be issued to the original payment method used for the transaction. If this is not possible, alternative refund methods may be considered.</textarea>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <label for="">Info@PeaceWorc.com</label>
                                
                                <textarea class="form-control" name="info_at_peaceworc" id="" cols="2" rows="2">If you have any questions or concerns about our refund policy or need assistance with a refund request, please contact our customer support team at [Info@PeaceWorc.com]</textarea>
                                
                            </li>
                        </ol>

                        <div class="form-group text-center m-4">
                            <button class="btn btn-primary">Update Policy</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script></script>
@endsection
