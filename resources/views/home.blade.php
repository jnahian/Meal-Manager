@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">
            <div class="row">
                <div class="col m2 s6 dash-card">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{ route('collection.index') }}">
                                <svg id="Layer_5" enable-background="new 0 0 64 64" viewBox="0 0 64 64" width="100%" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="32" x2="32" y1="63" y2=".698">
                                        <stop offset="0" stop-color="#9f2fff"/>
                                        <stop offset="1" stop-color="#0bb1d3"/>
                                    </linearGradient>
                                    <path d="m28 49v1c0 .552.449 1 1 1h2c1.654 0 3 1.346 3 3v3h-3v2h-2v-2c-1.654 0-3-1.346-3-3h2c0 .552.449 1 1 1h3v-1c0-.552-.449-1-1-1h-2c-1.654 0-3-1.346-3-3v-3h3v-2h2v2c1.654 0 3 1.346 3 3h-2c0-.552-.449-1-1-1zm28-29h7v1c0 3.86-3.14 7-7 7h-5v1 1 2h4c4.411 0 8 3.589 8 8v7c0 4.411-3.589 8-8 8h-2v3.805l-10.887-6.805 10.887-6.805v3.805h1c1.654 0 3-1.346 3-3v-5c0-1.654-1.346-3-3-3h-15.135c.083.715.135 1.435.135 2.161 0 1.579-.217 3.166-.623 4.727 1.632 1.92 2.623 4.401 2.623 7.112 0 6.065-4.935 11-11 11-3.438 0-6.51-1.588-8.529-4.066-.441.031-.886.066-1.309.066h-.323c-10.388 0-18.839-8.451-18.839-18.839 0-3.566 1.006-7.045 2.911-10.06l8.817-13.96-5.728-5.727v-.414c0-2.214 1.656-4.09 3.853-4.364l1.572-.197-.733-2.197 6.768-1.354 1.587 2.381 2.551-3.4 5.667 1.417-.96 3.12 1.841.23c2.198.274 3.854 2.15 3.854 4.364v.414l-5.728 5.728 8.817 13.96c.387.613.728 1.25 1.04 1.898h11.871v-2h-5c-3.86 0-7-3.14-7-7v-1h7c1.958 0 3.728.81 5 2.11v-5.517c-1.578-.899-6-3.759-6-7.594 0-4.343 5.709-9.226 6.36-9.768l.64-.533.64.534c.651.542 6.36 5.425 6.36 9.768 0 3.834-4.422 6.694-6 7.594v3.517c1.272-1.301 3.042-2.111 5-2.111zm-7.101 8c-.464-2.279-2.485-4-4.899-4h-4.899c.464 2.279 2.485 4 4.899 4zm-22.19-20.654-2.355 7.654h1.232l5.383-5.383c-.167-1.034-1.002-1.863-2.07-1.997zm-12.402-2.588 3.414 10.242h4.541l3.472-11.286-2.332-.583-3.45 4.6-2.412-3.619zm-5.276 4.859 5.383 5.383h1.198l-2.542-7.626-1.969.246c-1.068.134-1.903.963-2.07 1.997zm11.182 47.38c-.77-1.501-1.213-3.197-1.213-4.997 0-6.065 4.935-11 11-11 2.518 0 4.835.86 6.691 2.289.199-1.04.309-2.086.309-3.128 0-3.188-.9-6.297-2.602-8.991l-8.949-14.17h-10.898l-8.949 14.17c-1.702 2.694-2.602 5.804-2.602 8.991 0 9.285 7.554 16.839 16.838 16.839h.323c.017 0 .035-.003.052-.003zm18.787-4.997c0-4.963-4.038-9-9-9s-9 4.037-9 9 4.038 9 9 9 9-4.037 9-9zm16-18h-17.044c.227.656.42 1.323.574 2h15.47c2.757 0 5 2.243 5 5v5c0 2.757-2.243 5-5 5h-3v-2.195l-5.113 3.195 5.113 3.195v-2.195h4c3.309 0 6-2.691 6-6v-7c0-3.309-2.691-6-6-6zm-6-17.75v-8.25h2v8.247c1.752-1.173 4-3.156 4-5.247 0-2.553-3.177-5.998-5-7.669-1.823 1.671-5 5.116-5 7.669 0 2.099 2.248 4.08 4 5.25zm11.899 5.75h-4.899c-2.415 0-4.435 1.721-4.899 4h4.899c2.415 0 4.435-1.721 4.899-4zm-30.593 6.436-5.027-7.96-1.691 1.068 5.027 7.96zm.84 5.08 1.713-1.032-1.28-2.032-1.691 1.068zm-23.643 10.212-1.921.557c1.187 4.1 4.09 7.494 7.965 9.315l.851-1.811c-3.354-1.576-5.867-4.515-6.895-8.061zm-.503-3.567.001-.153-2-.018-.001.171c0 .658.044 1.321.13 1.971l1.982-.264c-.074-.562-.112-1.137-.112-1.707z"
                                          fill="url(#SVGID_1_)"/>
                                </svg>
                                <h4>Collections</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m2 s6 dash-card">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{ route('expense.index') }}">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 432.037 432.037" style="enable-background:new 0 0 432.037 432.037;" xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-44.9221" y1="510.5146" x2="-44.9221" y2="567.4136" gradientTransform="matrix(8 0 0 -8 454.8835 4509.3564)">
    <stop offset="0" style="stop-color:#006DF0"/>
    <stop offset="1" style="stop-color:#00E7F0"/>
</linearGradient>
                                    <path style="fill:url(#SVGID_1_);" d="M126.649,362.44c-12.271-6.108-23.463-14.177-33.136-23.888
	c-7.169-7.125-13.437-15.101-18.664-23.752c-2.207-3.828-7.099-5.141-10.927-2.934s-5.141,7.099-2.934,10.927
	c0.048,0.084,0.098,0.166,0.149,0.248c5.897,9.768,12.968,18.776,21.056,26.824c10.9,10.943,23.514,20.034,37.344,26.912
	c3.959,1.964,8.76,0.347,10.724-3.612S130.607,364.403,126.649,362.44L126.649,362.44z"/>
                                    <g>

                                        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="-33.8584" y1="510.5146" x2="-33.8584" y2="567.4136"
                                                        gradientTransform="matrix(8 0 0 -8 454.8835 4509.3564)">
                                            <stop offset="0" style="stop-color:#006DF0"/>
                                            <stop offset="1" style="stop-color:#00E7F0"/>
                                        </linearGradient>
                                        <path style="fill:url(#SVGID_2_);" d="M184.017,320.04c-17.673,0-32-14.327-32-32h-16c0.043,23.397,16.934,43.361,40,47.28v16.72
		h16v-16.72c26.112-4.572,43.575-29.446,39.003-55.559c-4.003-22.863-23.792-39.587-47.003-39.721c-17.673,0-32-14.327-32-32
		s14.327-32,32-32s32,14.327,32,32h16c-0.043-23.397-16.934-43.361-40-47.28v-16.72h-16v16.72
		c-26.112,4.572-43.575,29.446-39.003,55.559c4.003,22.863,23.792,39.587,47.003,39.721c17.673,0,32,14.327,32,32
		S201.69,320.04,184.017,320.04z"/>

                                        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-14.3533" y1="510.5146" x2="-14.3533" y2="567.4136"
                                                        gradientTransform="matrix(8 0 0 -8 454.8835 4509.3564)">
                                            <stop offset="0" style="stop-color:#006DF0"/>
                                            <stop offset="1" style="stop-color:#00E7F0"/>
                                        </linearGradient>
                                        <path style="fill:url(#SVGID_3_);" d="M345.977,109.568c2.801,3.418,7.842,3.917,11.26,1.116c3.418-2.801,3.917-7.842,1.116-11.26
		c-7.594-9.249-16.063-17.744-25.288-25.368c-3.42-2.814-8.474-2.324-11.288,1.096s-2.324,8.474,1.096,11.288
		C331.299,93.389,339.036,101.134,345.977,109.568L345.977,109.568z"/>

                                        <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="-33.8418" y1="510.5146" x2="-33.8418" y2="567.4136"
                                                        gradientTransform="matrix(8 0 0 -8 454.8835 4509.3564)">
                                            <stop offset="0" style="stop-color:#006DF0"/>
                                            <stop offset="1" style="stop-color:#00E7F0"/>
                                        </linearGradient>
                                        <path style="fill:url(#SVGID_4_);" d="M285.841,146.224c-56.154-56.236-147.264-56.302-203.5-0.147
		c-6.002,5.993-11.462,12.505-16.316,19.459c-24.922,35.533-32.402,80.444-20.344,122.136c1.211,4.25,5.638,6.715,9.888,5.504
		s6.715-5.638,5.504-9.888c-19.46-67.934,19.835-138.78,87.769-158.241c44.686-12.801,92.799-0.36,125.679,32.497
		c3.04,3.035,5.896,6.173,8.568,9.416c40.415,48.975,38.593,120.234-4.272,167.08c-0.128,0.112-0.24,0.24-0.368,0.36l-0.144,0.144
		c-0.096,0.096-0.2,0.184-0.288,0.28c-1.088,1.232-2.24,2.472-3.504,3.72c-30.193,30.16-73.431,43.288-115.296,35.008
		c-4.334-0.859-8.545,1.958-9.404,6.292c-0.859,4.334,1.958,8.545,6.292,9.404c47.111,9.333,95.774-5.435,129.752-39.376
		c1.256-1.248,2.4-2.496,3.568-3.752c0.204-0.182,0.399-0.374,0.584-0.576C342.589,288.847,340.745,200.672,285.841,146.224
		L285.841,146.224z"/>

                                        <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="-29.8581" y1="510.5146" x2="-29.8581" y2="567.4136"
                                                        gradientTransform="matrix(8 0 0 -8 454.8835 4509.3564)">
                                            <stop offset="0" style="stop-color:#006DF0"/>
                                            <stop offset="1" style="stop-color:#00E7F0"/>
                                        </linearGradient>
                                        <path style="fill:url(#SVGID_5_);" d="M432.017,184.04C432.039,82.419,349.677,0.022,248.056,0
		c-56.79-0.012-110.403,26.199-145.272,71.024c-11.923,9.249-22.634,19.963-31.88,31.888
		c-80.146,62.476-94.47,178.095-31.994,258.241s178.095,94.47,258.241,31.994c11.943-9.31,22.691-20.059,32.001-32.003
		c11.951-9.33,22.7-20.106,32-32.08C405.989,294.33,432.168,240.756,432.017,184.04L432.017,184.04z M416.017,184.04
		c0.06,30.836-8.44,61.084-24.552,87.376c15.563-49.242,9.71-102.758-16.128-147.472c-2.048-3.915-6.882-5.428-10.797-3.381
		s-5.428,6.882-3.381,10.797c0.104,0.199,0.217,0.394,0.337,0.584c30.745,53.198,29.959,118.944-2.048,171.392
		c30.627-96.803-23.02-200.105-119.822-230.731c-36.109-11.424-74.865-11.417-110.97,0.019
		c26.273-16.146,56.522-24.659,87.36-24.584c29.783-0.024,59.035,7.882,84.752,22.904c3.918,2.042,8.75,0.522,10.792-3.396
		c1.908-3.659,0.719-8.169-2.744-10.412c-44.949-26.232-98.901-32.214-148.504-16.464C239.52-7.726,342.965,17.25,391.363,96.458
		C407.477,122.83,416.007,153.134,416.017,184.04L416.017,184.04z M184.017,416.04c-92.784,0.024-168.019-75.173-168.044-167.956
		c-0.014-52.151,24.192-101.35,65.516-133.164c5.806-4.479,11.893-8.58,18.224-12.28c80.371-46.493,183.215-19.03,229.708,61.341
		c30.123,52.072,30.127,116.27,0.012,168.347C299.266,384.075,243.915,415.939,184.017,416.04L184.017,416.04z"/>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
</svg>

                                <h4>Expenses</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m2 s6 dash-card">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{ route('meal.index') }}">
                                <svg id="Gradient" viewBox="0 0 512 512" width="100%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="256" x2="256" y1="496" y2="16">
                                        <stop offset="0" stop-color="#12c2e9"/>
                                        <stop offset=".5" stop-color="#c471ed"/>
                                        <stop offset="1" stop-color="#f64f59"/>
                                    </linearGradient>
                                    <path d="m131.979 160.126q-2-.126-3.979-.126a63.993 63.993 0 0 0 -7.443 127.553l14.33 186.289a24.111 24.111 0 0 0 23.929 22.158h194.368a24.111 24.111 0 0 0 23.929-22.159l14.33-186.288a63.993 63.993 0 0 0 -7.443-127.553c-1.318 0-2.646.042-3.975.126a135.548 135.548 0 0 0 -86.311-74.816 39.981 39.981 0 0 0 -23.947-50.868 21.4 21.4 0 0 1 10.233-2.442 8 8 0 0 0 0-16c-13.762 0-25.229 6.721-29.83 16.429a39.982 39.982 0 0 0 -31.882 52.889 136.214 136.214 0 0 0 -86.309 74.808zm18.861 312.488-14.201-184.614h31.661l7.384 192h-16.87a8.036 8.036 0 0 1 -7.974-7.386zm176.846-184.614-7.386 192h-31.986l7.386-192zm-55.386 192h-32.6l-7.384-192h47.372zm-56-192 7.384 192h-31.984l-7.384-192zm144.86 184.613a8.036 8.036 0 0 1 -7.976 7.387h-16.87l7.386-192h31.663zm-113.16-423.237v6.624a8 8 0 0 0 16 0v-6.624a24 24 0 1 1 -16 0zm-68.982 74.569a120.045 120.045 0 0 1 48.011-24.409 39.9 39.9 0 0 0 57.95-.008 119.649 119.649 0 0 1 82.573 72.16 8 8 0 0 0 8.713 4.942 48 48 0 1 1 7.735 95.37h-256a48 48 0 1 1 7.735-95.37 8.011 8.011 0 0 0 8.713-4.942 120.624 120.624 0 0 1 34.57-47.743zm60.982 92.055a24 24 0 1 0 -24-24 24.028 24.028 0 0 0 24 24zm0-32a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8zm120 64a24 24 0 1 0 -24-24 24.028 24.028 0 0 0 24 24zm0-32a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8zm-232 8a24 24 0 1 0 24-24 24.028 24.028 0 0 0 -24 24zm24-8a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8zm122.343 29.657a8 8 0 0 1 0-11.314l16-16a8 8 0 0 1 11.314 11.314l-16 16a8 8 0 0 1 -11.314 0zm-88-88a8 8 0 0 1 0-11.314l16-16a8 8 0 0 1 11.314 11.314l-16 16a8 8 0 0 1 -11.314 0zm104-8a8 8 0 0 1 11.314-11.314l16 16a8 8 0 0 1 -11.314 11.314z"
                                          fill="url(#linear-gradient)"/>
                                </svg>

                                <h4>Meals</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m2 s6 dash-card">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{ route('report.monthly-all') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" width="100%">
                                    <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="183.5" x2="183.5" y1="15.117" y2="495.177">
                                        <stop offset="0" stop-color="#00efd1"/>
                                        <stop offset="1" stop-color="#00acea"/>
                                    </linearGradient>
                                    <linearGradient id="b" x1="255.965" x2="255.965" xlink:href="#a" y1="15.117" y2="495.177"/>
                                    <path d="m229 282h-91a10 10 0 0 0 -10 10v82a10 10 0 0 0 10 10h91a10 10 0 0 0 10-10v-82a10 10 0 0 0 -10-10zm-11 83h-70v-63h70z" fill="url(#a)"/>
                                    <path d="m462.773 356.926a9.986 9.986 0 0 0 -7.073-2.926 9.989 9.989 0 0 0 -7.071 2.921l-3.351 3.347-4.046-4.048a94.8 94.8 0 0 0 -53.232-152.309v-118.089a10.054 10.054 0 0 0 -10.236-9.822h-280.364c-5.519 0-10.4 4.3-10.4 9.822v163.178h-71.929a10.171 10.171 0 0 0 -10.071 10.129v119.362c0 28.209 23.024 51.509 51.237 51.509h284.917a46.822 46.822 0 0 0 46.167-40.436 94.408 94.408 0 0 0 39.771-19.113l4.04 4-3.455 3.434a9.986 9.986 0 0 0 -.006 14.126l36.909 36.956a24.9 24.9 0 0 0 35.06-.035 9.9 9.9 0 0 0 .679-.756 24.694 24.694 0 0 0 -.674-34.328zm-375.773 21.565a31 31 0 1 1 -62 0v-109.491h62zm254.154 31.509h-244.287a51.76 51.76 0 0 0 10.133-31.509v-282.491h261v105.735s-.33-.005-.436-.005a95.35 95.35 0 0 0 -19.527 2.015c0-.009-.037-.018-.037-.028v-83.171c0-5.523-4.518-9.546-10.041-9.546h-200.332a9.309 9.309 0 0 0 -9.627 9.546v83.171c0 5.523 4.1 10.283 9.627 10.283h183.688c-6.906 4-13.284 8-18.994 14h-164.694a10 10 0 0 0 0 20h148.547c-1.45 2-2.795 5-4.032 7h-144.515a10 10 0 0 0 0 20h137.388c-.609 3-1.1 5.041-1.491 7.728a10.167 10.167 0 0 0 -3.124-.728h-6.023a10 10 0 0 0 0 20h6.023a10.13 10.13 0 0 0 2.323 0c.153 2.605.413 5 .773 8h-9.119a10 10 0 0 0 0 20h11.261a10.173 10.173 0 0 0 2.816-.631 48.1 48.1 0 0 0 3.324 7.631h-17.405a10 10 0 0 0 0 20h28.283a10.209 10.209 0 0 0 1.84.014 94.986 94.986 0 0 0 71.9 34.525 26.892 26.892 0 0 1 -25.242 18.461zm-13.154-279v63h-180v-63zm48.311 239.965a79.843 79.843 0 0 1 -8.865.511 74.873 74.873 0 1 1 0-149.746 79.7 79.7 0 0 1 8.844.509 74.894 74.894 0 0 1 .021 148.726zm109.219 43.735c-.132.131-.26.264-.383.4a4.854 4.854 0 0 1 -6.452-.313l-29.81-29.853 6.807-6.808 29.838 29.88a4.7 4.7 0 0 1 0 6.692z"
                                          fill="url(#b)"/>
                                </svg>

                                <h4>Monthly Report</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m2 s6 dash-card">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{ route('report.monthly-meal') }}">
                                <svg id="_x33_0" enable-background="new 0 0 64 64" viewBox="0 0 64 64" width="100%" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="32" x2="32" y1="63" y2=".834">
                                        <stop offset="0" stop-color="#9f2fff"/>
                                        <stop offset="1" stop-color="#0bb1d3"/>
                                    </linearGradient>
                                    <path d="m49 9v2h-2c-1.103 0-2 .897-2 2v2c0 1.103.897 2 2 2h2v2c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-2h2c1.103 0 2-.897 2-2v-2c0-1.103-.897-2-2-2h-2v-2c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2zm8 3.999v2.001h-4v4h-2v-4h-4v-2h4v-4h2v4zm-3.772-11.429-1.228-.736-1.228.736c-2.648 1.59-5.682 2.43-8.772 2.43h-1v5h-2v-1c0-3.86-3.141-7-7-7s-7 3.14-7 7v1h-14c-1.103 0-2 .897-2 2v8.012c-2.269.065-4.372 1.1-5.794 2.88-1.423 1.778-2.206 4.012-2.206 6.318 0 2.711 1.056 5.26 2.973 7.177l5.027 5.027v20.586c0 1.103.897 2 2 2h42c1.103 0 2-.897 2-2v-35.16c4.877-2.56 8-7.589 8-13.281v-8.559h-1c-3.09 0-6.124-.84-8.772-2.43zm-4.228 37.05-2.115 2.38h-11.885v12h12v-9.12l2-2.25v15.37h-34v-10.586l1 1 12.027-12.027c.715-.715 1.31-1.519 1.775-2.387h9.382c.414 1.161 1.514 2 2.816 2 1.654 0 3-1.346 3-3s-1.346-3-3-3c-1.302 0-2.402.839-2.816 2h-8.58c.257-.903.396-1.848.396-2.819 0-2.277-.783-4.51-2.206-6.289-1.469-1.838-3.662-2.892-6.017-2.892-2.058 0-3.992.801-5.448 2.257l-1.329 1.329-1-1v-6.586h26.195c.751 4.667 3.639 8.653 7.805 10.84zm-6.957 10.837 2.957-3.327v4.87h-8v-8h8v.12l-3.043 3.423-2.25-2.25-1.414 1.414zm-1.043-17.457c0-.551.448-1 1-1s1 .449 1 1-.448 1-1 1-1-.449-1-1zm-14-24c0-2.757 2.243-5 5-5s5 2.243 5 5v1h-2v-1c0-1.654-1.346-3-3-3s-3 1.346-3 3v1h-2zm6 1h-2v-1c0-.551.448-1 1-1s1 .449 1 1zm8 2v1.56c0 .148.013.293.018.44h-28.018v6.993c-.626-.354-1.298-.615-2-.78v-8.213zm-38 17.181c0-1.825.628-3.614 1.769-5.04 1.086-1.361 2.71-2.141 4.454-2.141 1.523 0 2.956.593 4.034 1.671l2.743 2.743 2.743-2.743c1.078-1.078 2.511-1.671 4.034-1.671 1.743 0 3.367.78 4.454 2.141 1.141 1.425 1.769 3.215 1.769 5.069 0 .968-.177 1.907-.498 2.79h-9.12l-2.196 4.394-3.101-9.3-2.762 6.906h-2.323v2h3.677l1.238-3.094 2.899 8.7 3.804-7.606h6.816c-.249.34-.517.669-.821.973l-10.613 10.613-10.613-10.613c-1.539-1.539-2.387-3.586-2.387-5.792zm50 32.819h-42v-18.586l2 2v14.586h38v-32.287c.237.084.47.173.713.245l.287.086.287-.086c.243-.073.476-.162.713-.245zm8-48.44c0 5.699-3.604 10.642-9 12.393-5.396-1.751-9-6.694-9-12.393v-6.586c3.104-.163 6.128-1.084 8.802-2.688l.198-.12.198.119c2.673 1.605 5.698 2.526 8.802 2.689zm-30 38.44h2v2h-2zm-4 0h2v2h-2zm-4 0h2v2h-2zm10-26h6v2h-6zm0-4h6v2h-6zm0-4h6v2h-6z"
                                          fill="url(#SVGID_1_)"/>
                                </svg>

                                <h4>Meal Report</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m2 s6 dash-card">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{ route('user.index') }}">
                                <svg id="Layer_35" enable-background="new 0 0 64 64" viewBox="0 0 64 64" width="100%" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="32" x2="32" y1="63" y2="1">
                                        <stop offset="0" stop-color="#9f2fff"/>
                                        <stop offset="1" stop-color="#0bb1d3"/>
                                    </linearGradient>
                                    <path d="m3 27v8c0 2.206 1.794 4 4 4h1v16c0 2.206 1.794 4 4 4 1.201 0 2.266-.542 3-1.382.734.84 1.799 1.382 3 1.382 2.206 0 4-1.794 4-4v-12.556c.591.344 1.268.556 2 .556h1v16c0 2.206 1.794 4 4 4 1.201 0 2.266-.542 3-1.382.734.84 1.799 1.382 3 1.382 2.206 0 4-1.794 4-4v-16h1c.732 0 1.409-.212 2-.556v12.556c0 2.206 1.794 4 4 4 1.201 0 2.266-.542 3-1.382.734.84 1.799 1.382 3 1.382 2.206 0 4-1.794 4-4v-16h1c2.206 0 4-1.794 4-4v-8c0-5.129-3.24-9.504-7.777-11.218 2.263-1.415 3.777-3.922 3.777-6.782 0-4.411-3.589-8-8-8s-8 3.589-8 8c0 2.855 1.508 5.358 3.765 6.774-2.562.969-4.749 2.804-6.15 5.223-.742-.493-1.546-.896-2.392-1.216 2.263-1.414 3.777-3.921 3.777-6.781 0-4.411-3.589-8-8-8s-8 3.589-8 8c0 2.86 1.514 5.367 3.777 6.782-.846.319-1.65.723-2.392 1.216-1.401-2.419-3.587-4.254-6.149-5.223 2.256-1.416 3.764-3.92 3.764-6.775 0-4.411-3.589-8-8-8s-8 3.589-8 8c0 2.86 1.514 5.367 3.777 6.782-4.537 1.714-7.777 6.089-7.777 11.218zm37 14h-1v-14h-2v32c0 1.103-.897 2-2 2s-2-.897-2-2v-21h-2v21c0 1.103-.897 2-2 2s-2-.897-2-2v-32h-2v14h-1c-1.103 0-2-.897-2-2v-4.946-3.054c0-4.672 3.226-8.595 7.564-9.687l-.586 7.956 3.022 4.534 3.022-4.534-.586-7.956c4.338 1.092 7.564 5.015 7.564 9.687v3 5c0 1.103-.897 2-2 2zm-8-20c.138 0 .273.015.41.021l.568 7.711-.978 1.465-.978-1.466.568-7.711c.137-.005.272-.02.41-.02zm14.844-3.738c.702-.156 1.419-.262 2.156-.262.745 0 1.469.088 2.169.244l-2.169 3.036zm.849 4.63-1.307 1.307-1.924-5.084c.13-.066.253-.145.386-.206zm2.613 0 2.842-3.979c.133.061.264.124.394.19l-1.93 5.096zm-7.306-12.892c0-3.309 2.691-6 6-6s6 2.691 6 6-2.691 6-6 6-6-2.691-6-6zm-.256 10.226 2.869 7.575 3.387-3.386 3.387 3.387 2.873-7.588c2.277 1.835 3.74 4.641 3.74 7.786v8c0 1.103-.897 2-2 2h-1v-13h-2v31c0 1.103-.897 2-2 2s-2-.897-2-2v-21h-2v21c0 1.103-.897 2-2 2s-2-.897-2-2v-16-5-3c0-3.438-1.461-6.535-3.786-8.724.643-1.193 1.502-2.224 2.53-3.05zm-16.744-6.226c0-3.309 2.691-6 6-6s6 2.691 6 6-2.691 6-6 6-6-2.691-6-6zm-11 4c.621 0 1.227.077 1.823.188-.314 1.061-1.024 1.812-1.823 1.812-.802 0-1.515-.757-1.827-1.825.593-.11 1.202-.175 1.827-.175zm-6-8c0-3.309 2.691-6 6-6s6 2.691 6 6-2.691 6-6 6-6-2.691-6-6zm2.26 8.733c.563 1.923 2.02 3.267 3.74 3.267 1.715 0 3.167-1.336 3.735-3.25 2.135.864 3.93 2.447 5.051 4.526-2.325 2.189-3.786 5.286-3.786 8.724v3.054 4.946 16c0 1.103-.897 2-2 2s-2-.897-2-2v-21h-2v21c0 1.103-.897 2-2 2s-2-.897-2-2v-32h-2v14h-1c-1.103 0-2-.897-2-2v-8c0-4.191 2.595-7.782 6.26-9.267z"
                                          fill="url(#SVGID_1_)"/>
                                </svg>

                                <h4>Members</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card hide-on-small-and-down">
                <div class="card-content">
                    <div id="columnchart_material"></div>
                </div>
            </div>
            {{--<div class="card">
                <div class="card-content">
                    <div id="donutchart"></div>
                </div>
            </div>--}}
            <div class="card hide-on-small-and-down">
                <div class="card-content">
                    <div id="curve_chart"></div>
                </div>
            </div>

            {{--<div class="card print-only">
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>

                    <div id="printable">
                        <table class="responsive-table striped">
                            <thead>
                            <tr>
                                <th>Member</th>
                                <th>Deposit Amount</th>
                                <th>Meal</th>
                                <th>Meal Rate</th>
                                <th>Meal Expense</th>
                                <th>Other Expense</th>
                                <th>Total Expense</th>
                                <th>DUE/GIVE</th>
                            </tr>
                            </thead>

                            @php
                                $total_collection = 0;
                                $total_total_cost = 0;
                                $total_amount_left = 0;
                            @endphp
                            @if($msr)
                                <tbody>
                                @foreach($msr as $rep)

                                    @php
                                        $total_collection += $rep->collection;
                                        $total_total_cost += $rep->total_cost;
                                        $total_amount_left += $rep->amount_left;
                                    @endphp

                                    <tr>
                                        <td>{{ $rep->user->name }}</td>
                                        <td class="center-align">{{ number_format($rep->collection) }}</td>
                                        <td class="center-align">{{ $rep->meal }}</td>
                                        <td class="center-align">{{ number_format($rep->meal_rate, 2) }}</td>
                                        <td class="center-align">{{ number_format($rep->meal_cost, 2) }}</td>
                                        <td class="center-align">{{ number_format($rep->others_cost, 2) }}</td>
                                        <td class="center-align">{{ number_format($rep->total_cost, 2) }}</td>
                                        <td class="center-align">{{ number_format($rep->amount_left, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th class="right-align">Total =</th>
                                    <td class="center-align">{{ number_format($total_collection, 2) }}</td>
                                    <td colspan="4"></td>
                                    <td class="center-align">{{ number_format($total_total_cost, 2) }}</td>
                                    <td class="center-align">{{ number_format($total_amount_left, 2) }}</td>
                                </tr>
                                </tbody>
                            @else
                                <tfoot>
                                <tr>
                                    <td colspan="10">No data found..</td>
                                </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>

                </div>

                <div class="card-action center-align">
                    <a href="javascript:" onclick="PrintMe('printable')" class="btn orange hidden-print"><i class="material-icons left">print</i>Print</a>
                </div>
            </div>--}}
        </div>
    </div>
@endsection

@push('page-js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @if(count($yearlyMeals['data']))
        <script type="text/javascript">
            var colors = ['#4CAF50', '#F44336', '#00bcd4', '#a730d4'];
            var rows = [['Months']];

            @foreach($yearlyMeals['names'] as $name)
                rows[0].push("{{$name}}");
                    @endforeach

                    @foreach(data_get($yearlyMeals, 'data', []) as $month => $year)
            var rowData = ['{{ month_name($month, 'M') }}'];
            @foreach($year as $row)
            rowData.push({{ $row['total_cost'] }});
            @endforeach
            rows.push(rowData);
            @endforeach

            google.charts.load('current', {'packages': ['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable(rows);

                var options = {
                    chart: {
                        title: '{{ $title }}'
                        // subtitle: 'Monthly Report',
                    },
                    colors: colors,
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>

        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart2);

            var carveData = [['Months']];

            @foreach($yearlyMeals['names'] as $name)
                carveData[0].push("{{$name}}");
                    @endforeach

                    @foreach(data_get($yearlyMeals, 'data', []) as $month => $year)
            var rowData = ['{{ month_name($month, 'M') }}'];
            @foreach($year as $row)
            rowData.push({{ $row['meals'] }});
            @endforeach
            carveData.push(rowData);

            @endforeach

            function drawChart2() {
                var data = google.visualization.arrayToDataTable(carveData);

                var options = {
                    title: 'Monthly Meal Summery',
                    curveType: 'function',
                    legend: {position: 'bottom'},
                    colors: colors,
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>
    @endif
@endpush
