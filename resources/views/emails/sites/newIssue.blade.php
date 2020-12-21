<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width" name="viewport" />
    <!--[if !mso]><!-->
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-->
    <!--<![endif]-->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        p {
            font-size: 13px !important;
        }

        table,
        td,
        tr {
            vertical-align: top;
            border-collapse: collapse;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }

    </style>
    <style id="media-query" type="text/css">
        @media (max-width: 720px) {

            .block-grid,
            .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }

            .block-grid {
                width: 100% !important;
            }

            .col {
                width: 100% !important;
            }

            .col>div {
                margin: 0 auto;
            }

            img.fullwidth,
            img.fullwidthOnMobile {
                max-width: 100% !important;
            }

            .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
            }

            .no-stack.two-up .col {
                width: 50% !important;
            }

            .no-stack .col.num4 {
                width: 33% !important;
            }

            .no-stack .col.num8 {
                width: 66% !important;
            }

            .no-stack .col.num4 {
                width: 33% !important;
            }

            .no-stack .col.num3 {
                width: 25% !important;
            }

            .no-stack .col.num6 {
                width: 50% !important;
            }

            .no-stack .col.num9 {
                width: 75% !important;
            }

            .video-block {
                max-width: none !important;
            }

            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide {
                display: block !important;
                max-height: none !important;
            }
        }

    </style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #ffffff;">
    <!--[if IE]><div class="ie-browser"><![endif]-->
    <table bgcolor="transparent" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
        style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; width: 100%;"
        valign="top" width="100%">
        <tbody>
            <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                    <div style="background-color:transparent;">
                        <div class="block-grid"
                            style="Margin: 0 auto; min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div
                                style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                <div class="col num12"
                                    style="min-width: 320px; max-width: 700px; display: table-cell; vertical-align: top; width: 700px;">
                                    <div style="width:100% !important;">
                                        <!--[if (!mso)&(!IE)]><!-->
                                        <div
                                            style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:30px; padding-bottom:55px; padding-right: 0px; padding-left: 0px;">
                                            <!--<![endif]-->
                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 30px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
                                            <div
                                                style="font-family:Helvetica, sans-serif;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:30px;">
                                                <div style="   font-family: Helvetica, sans-serif; ">
                                                    <p style="text-align: left;  word-break: break-word;   margin: 0;">
                                                        <span style="">Dear <strong>divisi
                                                                {{$issueData->tujuan}}</strong>,</span></p>
                                                    <p style="text-align: left;  word-break: break-word;   margin: 0;">
                                                        <span style="">Kami telah menerima laporan issue
                                                            mengenai
                                                            sistem/program/jaringan sistem
                                                            perusahaan.<br><br>
                                                            <h5>Yang melapor
                                                                mengenai laporan
                                                                ini:</h5> <br>
                                                            Nama Pelapor: {{$issueData->nama_lengkap}}<br>
                                                            Email Pelapor: @if($issueData->email != '') <a
                                                                href="mailto:{{$issueData->email}}?subject=Re:[Ticket#{{$issueData->id}}] Important: Issue Report have been made to our systems."
                                                                target="_top">{{$issueData->email}}</a>
                                                            @else Email pelapor tidak ditemukan. @endif <br><br>
                                                            <h5>Dan yang sudah menyetujui laporan ini:</h5><br>
                                                            {{$issueData->approve}}<br><br>
                                                            Mohon ditindak lanjuti laporan dengan nomor antrian
                                                            #{{$issueData->id}} yang
                                                            berisi mengenai:
                                                            <br>
                                                            {!!$issueData->kendala!!}
                                                            <br>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <!--[if mso]></td></tr></table><![endif]-->
                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 30px; padding-left: 30px; padding-top: 20px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
                                            <div
                                                style="font-family:Helvetica, sans-serif;padding-top:20px;padding-right:30px;padding-bottom:10px;padding-left:30px;">
                                                <div style="   font-family: Helvetica, sans-serif; ">
                                                    <p style="text-align: left;  word-break: break-word;   margin: 0;">
                                                        <span style=""><strong>Terima kasih atas
                                                                perhatiannya
                                                                ya.</strong><br>
                                                            Report Issue BTSA Logistics <br>
                                                            report@btsa.co.id <br></span></p>
                                                </div>
                                            </div>
                                            <div
                                                style="font-family:Helvetica, sans-serif;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:30px;">
                                                <div style="   font-family: Helvetica, sans-serif; ">
                                                    <small class="text-muted">Anda menerima email ini sebagai
                                                        pemberitahuan
                                                        tentang adanya
                                                        issue report baru
                                                        dalam sistem IR BTSA Logistics.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<![endif]-->
                                </div>
                            </div>
                            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                        </div>
                    </div>
                    </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    <!--[if (IE)]></div><![endif]-->
</body>

</html>
