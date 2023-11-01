@extends('welcome')
@section('page-title', 'Arbitration Agreement')
@section('custom-css')
    <style>
        .arbitration-header {
            border-bottom: 1px dashed #bbb9b9;
        }

        .arbitration-points {
            padding-left: 15px;
        }

        .arbitration-points li {
            list-style-type: lower-roman;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center arbitration-header">
                        <h4>Arbitration Agreement</h4>
                    </div>
                    <form>
                        <div class="form-group ml-1">
                            <label for="" class="mt-4">Arbitration Agreement</label>
                            <textarea name="arbitration_agreement" class="form-control" id="" cols="5" rows="3">Any dispute, claim, or controversy arising out of or relating to these Terms and Conditions or the use of the PEACEWORC Application, including but not limited to any issues concerning the breach, termination, enforcement, interpretation, or validity thereof, shall be resolved through binding arbitration. 
                            </textarea>
                        </div>
                        <label for="">Arbitration Process</label>
                        <ul class="arbitration-points">
                            <li>
                                <textarea name="arbitration_process_1" class="form-control" id="" cols="5" rows="3">Choice of Arbitrator:** The arbitration shall be administered by a single arbitrator selected jointly by both parties. If the parties cannot agree on an arbitrator within [number of days] days of the initiation of arbitration, either party may request that the American Arbitration Association (AAA) appoint an arbitrator
                                </textarea>
                            </li>
                            <li>
                                <textarea name="arbitration_process_2" class="form-control" id="" cols="5" rows="3">Arbitration Rules:** The arbitration shall be conducted in accordance with the rules and procedures of the AAA, as modified by these Terms and Conditions.
                                </textarea>
                            </li>
                            <li>
                                <textarea name="arbitration_process_3" class="form-control" id="" cols="5" rows="3">Location of Arbitration:** The arbitration proceedings shall be held in [City], [State], unless the parties mutually agree to a different location.
                                </textarea>
                            </li>
                            <li>
                                <textarea name="arbitration_process_4" class="form-control" id="" cols="5" rows="3">Arbitration Award:** The arbitrator's decision and award shall be final and binding, and judgment on the award rendered by the arbitrator may be entered in any court having jurisdiction thereof.
                                </textarea>
                            </li>
                        </ul>

                        <div class="form-group">
                            <label for="">Class Action Waiver</label>
                            <textarea class="form-control" name="class_action_waiver" id="" cols="5" rows="3">The parties agree that any arbitration or legal proceedings will be conducted on an individual basis, and not as a class, collective, or representative action. Accordingly, both parties waive the right to participate in any class, collective, or representative proceedings.</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Governing Law</label>
                            <textarea class="form-control" name="governing_law" id="" cols="5" rows="3">These Terms and Conditions and any arbitration conducted hereunder shall be governed by and construed in accordance with the laws of the State of Pennsylvania, without regard to its conflict of law principles.</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Contact Information</label>
                            <textarea class="form-control" name="contact_information" id="" cols="5" rows="3">If you have any questions or concerns regarding these Terms and Conditions or the arbitration process, please contact us at [info@PeaceWorc.com]. By using the PEACEWORC Application, you agree to be bound by this arbitration agreement. If you do not agree to this arbitration agreement, you must discontinue use of the PEACEWORC Application.</textarea>
                        </div>

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
