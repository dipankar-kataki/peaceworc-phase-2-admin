@extends('welcome')
@section('page-title', 'Terms And Conditions')
@section('custom-css')
    <style>
        .terms-and-conditions-header {
            border-bottom: 1px dashed #bbb9b9;
            margin-top:20px;
        }
        .terms-points{
            padding-left:15px;
        }
        .terms-points li{
            list-style-type: lower-roman;
            margin-bottom:10px;
        }
    </style>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body container">
                    <div class="text-center terms-and-conditions-header">
                        <h4>Terms And Conditions</h4>
                    </div>
                    <form>
                        <div class="form-group">
                            <label class="mt-4">Effective Date - (dd-mm-yyyy) :</label>
                            <div class="col-md-3" style="padding-left:0px;">
                                <input class="form-control" type="date" value="2023-10-25">
                            </div>
                        </div>

                        <ul class="terms-points">
                            <li>
                                <label for="">Property of the website</label>
                                <textarea name="property_of_website" class="form-control" id="" cols="5" rows="3">The PEACEWORC application ("App") is owned by PEACEWORC LLC, registered in Pennsylvania, with a principal place of business at One Penn Center, 1617 John F. Kennedy Blvd #555, Philadelphia, PA 19104.
                                </textarea>
                            </li>
                            <li>
                                <label for="">Disclaimer of the Platform</label>
                                <textarea name="disclaimer_of_the_platform" class="form-control" id="" cols="5" rows="3">PEACEWORC is a legally approved platform that facilitates connections between users and professional agencies and caregivers. The platform uses health-related information and personal data to improve user experiences. All user data is strictly protected from misuse.
                                </textarea>
                            </li>
                            <li>
                                <label for="">Registration Procedure</label>
                                <textarea name="registration_procedure" class="form-control" id="" cols="5" rows="3">To register for this App, users must be at least 18 years old. Users under the age of 18 require parental consent. Medical and health professionals must demonstrate that their qualifications comply with their respective country's laws.
                                </textarea>
                            </li>
                            <li>
                                <label for="">How We Work</label>
                                <textarea name="how_we_work" class="form-control" id="" cols="5" rows="3">User data is anonymized, and aggregated data is stored securely. Users can access their data conveniently from any device.
                                </textarea>
                            </li>
                            <li>
                                <label for="">Alterations to Terms and Conditions</label>
                                <textarea name="alternation_to_terms" class="form-control" id="" cols="5" rows="3">We may update these terms and conditions periodically. Users will be notified of changes on the App's landing page, and it is their responsibility to review them. </textarea>
                            </li>
                            <li>
                                <label for="">Precautions</label>
                                <textarea name="precautions" class="form-control" id="" cols="5" rows="3">PEACEWORC provides gig work-related information and guidance, not legal or psychological advice. We are not registered healthcare or medical advisors and do not substitute expert medical advice. </textarea>
                            </li>
                            <li>
                                <label for="">Termination of Agreement</label>
                                <textarea name="termination_of_agreement" class="form-control" id="" cols="5" rows="3">Uninstalling the App terminates the user agreement. However, we may reinstate an agreement if a user breaches its terms. </textarea>
                            </li>
                            <li>
                                <label for="">Disclaimer, Limitations, and Prohibitions</label>
                                <textarea name="disclaimer_limitation_prohibitation" class="form-control" id="" cols="5" rows="3">Users are responsible for the information they share on PEACEWORC. Users must not violate any laws, regulations, or ethical standards. This prohibition ensures the App operates effectively worldwide. </textarea>
                            </li>
                            <li>
                                <label for="">PEACEWORC Privacy Policy</label>
                                <textarea name="privacy_policy" class="form-control" id="" cols="5" rows="3">Our Privacy Policy governs user data protection. Users have the right to access, rectify, challenge, alter, or delete their data. Express consent is obtained for using user data to manage health services and maintain service quality. </textarea>
                            </li>
                            <li>
                                <label for="">Data Security</label>
                                <textarea name="data_security" class="form-control" id="" cols="5" rows="3">Data security complies with U.S. laws. We will promptly adopt additional data security measures from worldwide laws, such as European Union Data privacy laws, when necessary.</textarea>
                            </li>
                            <li>
                                <label for="">Laws and Jurisdiction Governing this App</label>
                                <textarea name="laws_and_jurisdiction" class="form-control" id="" cols="5" rows="3">Initially, this App is governed by Pennsylvania's general conditions and privacy policy. We may change or expand legal jurisdiction if required.</textarea>
                            </li>
                            <li>
                                <label for="">Use of Automatic Data Collection System</label>
                                <textarea name="auto_data_collection" class="form-control" id="" cols="5" rows="3">An automatic data collection system, such as cookies, may be used for App functionality. These cookies do not carry intelligible data from the user's computer and ensure safe data usage.</textarea>
                            </li>
                        </ul>

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
