<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&amp;l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8"/>
    <title>Foundry Chat Super Admin</title>
    <meta name="description"
          content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>

    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    {{--    <link--}}
    {{--        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.2.9"--}}
    {{--        rel="stylesheet" type="text/css"/>--}}
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.2.9"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/base/light.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/menu/light.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/brand/dark.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/aside/dark.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon"
          href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico"/>
    <!-- Hotjar Tracking Code for keenthemes.com -->
    <script>(function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 1070954, hjsv: 6};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');</script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="https://preview.keenthemes.com/metronic/demo1/index.html">
        <img alt="Logo"
             src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/logo-light.png"/>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"/>
								<path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								<path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"/>
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">
                <!--begin::Logo-->
                <a class="brand-logo">
                    <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M26 12.8251C26 19.9087 20.2576 25.6511 13.174 25.6511C12.6323 25.6511 12.0985 25.6175 11.5744 25.5523C-3.77304 27.2631 -0.0554459 25.2651 1.7128 24.3148L1.71281 24.3148C1.83558 24.2489 1.94896 24.1879 2.0459 24.1336C2.86367 23.232 2.43786 20.8307 1.85274 18.8582C0.892446 17.06 0.348066 15.0061 0.348066 12.8251C0.348066 5.74153 6.09045 -0.000854492 13.174 -0.000854492C20.2576 -0.000854492 26 5.74153 26 12.8251ZM13.0045 23.1182C18.5906 23.1182 23.1191 18.5898 23.1191 13.0036C23.1191 7.41748 18.5906 2.88902 13.0045 2.88902C7.41835 2.88902 2.88989 7.41748 2.88989 13.0036C2.88989 18.5898 7.41835 23.1182 13.0045 23.1182Z"
                              fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M26 12.8251C26 19.9087 20.2576 25.6511 13.174 25.6511C12.6323 25.6511 12.0985 25.6175 11.5744 25.5523C-3.77304 27.2631 -0.0554459 25.2651 1.7128 24.3148L1.71281 24.3148C1.83558 24.2489 1.94896 24.1879 2.0459 24.1336C2.86367 23.232 2.43786 20.8307 1.85274 18.8582C0.892446 17.06 0.348066 15.0061 0.348066 12.8251C0.348066 5.74153 6.09045 -0.000854492 13.174 -0.000854492C20.2576 -0.000854492 26 5.74153 26 12.8251ZM13.0045 23.1182C18.5906 23.1182 23.1191 18.5898 23.1191 13.0036C23.1191 7.41748 18.5906 2.88902 13.0045 2.88902C7.41835 2.88902 2.88989 7.41748 2.88989 13.0036C2.88989 18.5898 7.41835 23.1182 13.0045 23.1182Z"
                              fill="white"/>
                    </svg>

                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
										<path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-active" aria-haspopup="true">
                            <a href="{{ route('communities.community.index') }}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
													<path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-text">Communities</span>
                            </a>
                        </li>

                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper" style="padding-top: 50px;">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->

                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">
                        <!--begin::Search-->
                        <div class="dropdown" id="kt_quick_search_toggle">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
											<span class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
														<path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000" fill-rule="nonzero"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                    <!--begin:Form-->
                                    <form method="get" class="quick-search-form">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            opacity="0.3"/>
																		<path
                                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                            fill="#000000" fill-rule="nonzero"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search..."/>
                                            <div class="input-group-append">
														<span class="input-group-text">
															<i class="quick-search-close ki ki-close icon-sm text-muted"></i>
														</span>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                    <!--begin::Scroll-->
                                    <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325"
                                         data-mobile-height="200"></div>
                                    <!--end::Scroll-->
                                </div>
                            </div>
                            <!--end::Dropdown-->
                        </div>

                        <!--end::Languages-->
                        <!--begin::User-->
                        <div class="topbar-item">
                            <div
                                class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                id="kt_quick_user_toggle">
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ optional(auth()->user())->name }} <br> <small>[{{ optional(auth()->user())->email }}]</small></span>

                            </div>

                            <a class="menu-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <span class="menu-text">{{ __('Logout') }}</span>

                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->


            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->

                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="configuration mb-4">
                    <div class="btn-group  float-right mx-4">

                        <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                           href="{{ route('categories.category.index') }}">
                            <i class="fa fa-users"></i>
                            Categories
                        </a>
                        <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                                href="{{ route('channels.channel.index') }}">
                            <i class="fa fa-users"></i>
                            Channels
                        </a> <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                                href="{{ route('communities.community.index') }}">
                            <i class="fa fa-users"></i>
                            Communities
                        </a>
                        <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                           href="{{ route('posts.post.index') }}">
                            <i class="fa fa-users"></i>
                            Post
                        </a>
                        <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                           href="{{ route('post_comments.post_comment.index') }}">
                            <i class="fa fa-users"></i>
                            Post Comments
                        </a>
                        <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                           href="{{ route('post_media.post_media.index') }}">
                            <i class="fa fa-users"></i>
                            Post Media
                        </a>
                        <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                           href="{{ route('post_tags.post_tag.index') }}">
                            <i class="fa fa-users"></i>
                            Post tag
                        </a>
                        <a class="btn btn-link btn-outline-dark btn-sm mr-4"
                           href="{{ route('reacts.react.index') }}">
                            <i class="fa fa-users"></i>
                            React
                        </a>

                    </div>
                </div>
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">

                        @yield('content')

                    </div>
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>

<!--end::Sticky Toolbar-->
<!--begin::Demo Panel-->
<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0">Select A Demo</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <h5 class="font-weight-bold mb-4 text-center">Demo 1</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo offcanvas-demo-active">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo1.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo1/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo1/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 2</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo2.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo2/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo2/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 3</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo3.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo3/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo3/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 4</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo4.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo4/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo4/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 5</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo5.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo5/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo5/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 6</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo6.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo6/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo6/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 7</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo7.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo7/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo7/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 8</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo8.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo8/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo8/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 9</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo9.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo9/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo9/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 10</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo10.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo10/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo10/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 11</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo11.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo11/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo11/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 12</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo12.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo12/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo12/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 13</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo13.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="../demo13/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow"
                       target="_blank">Default</a>
                    <a href="../demo13/rtl/index.html"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow ml-3"
                       target="_blank">RTL Version</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 14</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo14.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 15</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo15.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 16</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo16.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 17</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo17.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 18</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo18.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 19</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo19.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 20</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo20.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 21</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo21.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 22</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo22.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 23</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo23.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 24</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo24.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 25</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo25.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 26</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo26.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 27</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo27.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 28</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo28.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 29</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo29.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
            <h5 class="font-weight-bold mb-4 text-center">Demo 30</h5>
            <div class="overlay rounded-lg mb-8 offcanvas-demo">
                <div class="overlay-wrapper rounded-lg">
                    <img
                        src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/demos/demo30.png"
                        alt="" class="w-100"/>
                </div>
                <div class="overlay-layer">
                    <a href="#"
                       class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming
                        soon</a>
                </div>
            </div>
        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer">
            <a href="https://1.envato.market/EA4JP" target="_blank"
               class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase">Buy Metronic Now!</a>
        </div>
        <!--end::Purchase-->
    </div>
    <!--end::Content-->
</div>
<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->

<script type="module">
    // Import the functions you need from the SDKs you need
    import {initializeApp} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
    import {getAnalytics} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
    import {getDatabase} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-database.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyCEjcCPhzeEtj9Tp_MDZM3waHxM97JeahM",
        authDomain: "schooapp2022.firebaseapp.com",
        databaseURL: "https://schooapp2022-default-rtdb.firebaseio.com",
        projectId: "schooapp2022",
        storageBucket: "schooapp2022.appspot.com",
        messagingSenderId: "26197024544",
        appId: "1:26197024544:web:209e7d360fb391cc3ac145",
        measurementId: "G-74SZW3KGPH"
    };

    // Initialize Firebase
    var app = initializeApp(firebaseConfig);
    var firebase = app;
    var analytics = getAnalytics(app);
    var database = getDatabase(app);

</script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script
    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.js?v=7.2.9"></script>
{{--<script--}}
{{--    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9"></script>--}}
<script
    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/js/scripts.bundle.js?v=7.2.9"></script>
{{--<script src="https://keenthemes.comhttps://preview.keenthemes.com/metronic/assets/js/engage_code.js"></script>--}}
{{--<!--end::Global Theme Bundle-->--}}
{{--<!--begin::Page Vendors(used by this page)-->--}}
{{--<script--}}
{{--    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.2.9"></script>--}}
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
{{--<script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/js/pages/widgets.js?v=7.2.9"></script>--}}


<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<!--end::Page Scripts-->

@yield('scripts')
@yield('js')
</body>
<!--end::Body-->
</html>
