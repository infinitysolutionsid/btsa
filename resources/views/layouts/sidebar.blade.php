<?php
use App\IRModel;
use Illuminate\Support\Facades\DB;
$issue = DB::table('issuereport_tb')->where('issuereport_tb.status','=','Belum Selesai')->get();
$WarningModel = DB::table('warningdb')->where('warningdb.approved_by','=','unapproved')->get();
$quote = DB::table('quote')->where('quote.status','=','loading')->get();
?>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="/" target="_blank"><span>BTSA LOGISTICS</span></a></div>
            <ul>
                <li class="label">Main Focus</li>
                <li><a href="/dashboard"><i class="ti-home"></i> Dashboard</a></li>

                <li class="label">Management</li>
                @if(auth()->user()->role == 'administrator')
                <li><a href="/member"><i class="ti-user"></i> User Managements</a></li>
                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid2-alt"></i> Candidate<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="/candidate/managements">Daftar pelamar</a>
                        </li>
                        <li><a href="/candidate/interviewed">Pelamar yang interview</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-email"></i> Warning Notice <span
                            class="btn btn-danger btn-sm m-l-35">@if($WarningModel->count()>=1){{$WarningModel->count()}} @else 0
                            @endif</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="/warning-notice">Request Notice</a>
                        </li>

                    </ul>
                </li>
                <li><a href="/hrd"><i class="ti-layers-alt"></i> Utility Personalia</a></li>
                <li><a href="/legal"><i class="ti-calendar"></i> Legality Documents</a></li>
                <li><a href="/jadwal"><i class="ti-calendar"></i> Jadwal Kapal Managements</a></li>
                <li><a href="/vessel"><i class="ti-rocket"></i> Vessel Management</a></li>
                @endif
                @if(auth()->user()->role=='it')
                <li><a href="/member"><i class="ti-user"></i> User Managements</a></li>
                @endif
                @if(auth()->user()->role == 'head')
                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid2-alt"></i> Candidate<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="/candidate/managements">Daftar pelamar</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->role=='it' || auth()->user()->role=='head')
                <li><a class="sidebar-sub-toggle"><i class="ti-email"></i> Warning Notice <span
                            class="btn btn-danger btn-sm m-l-35">@if($WarningModel->count()>=1){{$WarningModel->count()}} @else 0
                            @endif</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="/warning-notice">Request Notice</a>
                        </li>

                    </ul>
                </li>
                @endif
                @if(auth()->user()->role=='hrd')
                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid2-alt"></i> Candidate<span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="/candidate/managements">Daftar pelamar</a>
                        </li>
                        <li><a href="/candidate/interviewed">Pelamar yang interview</a></li>
                    </ul>
                </li>
                <li><a href="/hrd"><i class="ti-layers-alt"></i> Utility Personalia</a></li>
                @endif

                <li><a class="sidebar-sub-toggle"><i class="ti-shine"></i> Quote Reports <span
                            class="btn btn-danger btn-sm m-l-35">@if($quote->count()>=1){{$quote->count()}} @else 0
                            @endif</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        @if(auth()->user()->role=='user' || auth()->user()->role=='administrator')
                        <li><a href="/quote-request">Quote request</a></li>
                        @endif
                        @if(auth()->user()->role=='head' || auth()->user()->role=='administrator')
                        <li><a href="/quote-request">Quote request</a></li>
                        @endif
                        @if(auth()->user()->role=='it' || auth()->user()->role=='administrator' ||
                        auth()->user()->role=='umum')
                        <li><a href="/quote-published">Quote published</a></li>
                        @endif
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-envelope"></i> Issue Reports <span
                            class="btn btn-danger btn-sm m-l-35">@if($issue->count()>=1){{$issue->count()}} @else 0
                            @endif</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        @if(auth()->user()->role=='user' || auth()->user()->role=='administrator')
                        <li><a href="/queue">Queue</a></li>
                        @endif
                        @if(auth()->user()->role=='it' || auth()->user()->role=='administrator' ||
                        auth()->user()->role=='umum'|| auth()->user()->role=='administrator' ||
                        auth()->user()->role=='hrd')
                        <li><a href="/itCheck">IT & PU Checked</a></li>
                        <li><a href="/itSolved">IT & PU Solved IR</a></li>
                        @endif
                        @if(auth()->user()->role=='head' || auth()->user()->role=='administrator')
                        <li><a href="/headCheck">Head Checked</a></li>
                        @endif

                    </ul>
                </li>
                @if(auth()->user()->role=='legal')
                <li><a href="/legal"><i class="ti-calendar"></i> Legality Documents</a></li>
                @endif
                @if(auth()->user()->role=='user')
                <li><a href="/jadwal"><i class="ti-calendar"></i> Jadwal Kapal Managements</a></li>
                @endif
                @if(auth()->user()->role=='user')
                <li><a href="/vessel"><i class="ti-rocket"></i> Vessel Management</a></li>
                @endif
                <li><a href="/logout"><i class="ti-close"></i> Logout</a></li>
                </>
        </div>
    </div>
</div>
