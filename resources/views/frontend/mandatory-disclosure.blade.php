@extends('layouts.app')
@section('title', 'Mandatory Public Disclosure - Jeeva Memorial Senior Secondary School')

@section('content')
<main class="page-shell" id="mandatory-disclosure">
    <div class="site-container">
        <section class="page-hero">
            <h1>Mandatory Public Disclosure (Appendix-IX)</h1>
            <p>This page is intentionally structured for CBSE disclosure updates. Unknown fields are left blank or marked as pending update.</p>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Mandatory Disclosure</span>
            </div>
        </section>
    </div>

    <x-ui.section-wrapper eyebrow="Section A" title="General Information">
        <div class="simple-table-wrap">
            <table class="simple-table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Information</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Name of the School</td>
                        <td>Jeeva Memorial Senior Secondary School</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Affiliation No</td>
                        <td>1930806</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Address</td>
                        <td>No.210, Palla Egai Village, Puliur Post, Thirukazhukundram T.K., Kancheepuram District, Pin - 603 109</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Email</td>
                        <td>jeevamemorialschool@gmail.com</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Phone Number</td>
                        <td>+91-89392 22122 / +91-73734 18852 / +91-91503 17496 / +91-44-2954 0474</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Principal Name</td>
                        <td>To be updated</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-ui.section-wrapper>

    <x-ui.section-wrapper eyebrow="Section B" title="Documents and Information" tone="soft">
        <div class="simple-table-wrap">
            <table class="simple-table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Document</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Copies of Affiliation / Upgradation Letter</td>
                        <td><a href="#">PDF - Upload Pending</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Copies of Society / Trust Registration</td>
                        <td><a href="#">PDF - Upload Pending</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Copy of NOC from State / UT</td>
                        <td><a href="#">PDF - Upload Pending</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Fire Safety Certificate</td>
                        <td><a href="#">PDF - Upload Pending</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Building Safety Certificate</td>
                        <td><a href="#">PDF - Upload Pending</a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Water / Health / Sanitation Certificates</td>
                        <td><a href="#">PDF - Upload Pending</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-ui.section-wrapper>

    <x-ui.section-wrapper eyebrow="Section C" title="Results and Academics">
        <div class="simple-table-wrap">
            <table class="simple-table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Item</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Academic Session</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Annual Academic Calendar</td>
                        <td><a href="#">Calendar - Upload Pending</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Fee Structure</td>
                        <td><a href="#">Fee Structure - Upload Pending</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Last Three-Year Board Result</td>
                        <td>To be updated</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-ui.section-wrapper>

    <x-ui.section-wrapper eyebrow="Section D" title="Staff (Teaching)" tone="soft">
        <div class="simple-table-wrap">
            <table class="simple-table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Particular</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Total Number of Teachers</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>PGT</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>TGT</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>PRT</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Teachers Section Ratio</td>
                        <td>To be updated</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-ui.section-wrapper>

    <x-ui.section-wrapper eyebrow="Section E" title="School Infrastructure">
        <div class="simple-table-wrap">
            <table class="simple-table">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Particular</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Total Campus Area</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Class Rooms</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Laboratories</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Internet Facility</td>
                        <td>To be updated</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Sports Facilities</td>
                        <td>To be updated</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-ui.section-wrapper>
</main>
@endsection
