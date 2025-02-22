
<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Site Title -->
		<title>Sherah - HTML eCommerce Dashboard Template</title>

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 

		<!-- Fav Icon -->
		<link rel="icon" href="{{ asset('backend/assets/img/favicon.png') }}">
		
		<!-- sherah Stylesheet -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/core.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome-all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/charts.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/jvector-map.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/slickslider.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/jquery-ui.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/reset.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
		
	</head>
	<body id="sherah-dark-light" class="sherah-print-template">
	
		<div class="sherah-body-area">
			
			<!-- sherah Dashboard -->
			<section>
				<div class="container">
					<div class="row">	
						<div class="col-12">
							<div class="sherah-body">
								<!-- Dashboard Inner -->
								<div class="sherah-dsinner">
									
									<div class="sherah-page-inner sherah-default-bg mg-top-25">

                                       <div class="sherah-invoice-header">
                                            <a href="{{ route('admin.dashboard') }}"> <img class="sherah-logo__main" src="{{ asset('backend/assets/img/logo.png') }}" alt="#"></a>
                                            <p>Invoice | <a href="#">Sherah</a> - Admin Dashboard Template</p>
                                            <p class="sherah-invoice-header__id text-end"><span class="sherah-color1">Order #BD80288</span><span class="d-block">November 02, 2022 <small>01 : 30 PM</small></span></p>
                                       </div>

                                       <!-- Sherah Invoice -->
                                       <div class="sherah-invoice-form mg-btm-70">
                                            <div class="sherah-invoice-form__first  sherah-invoice-form__first--print">
                                                <div class="sherah-invoice-form__single">
                                                     <h4 class="sherah-invoice-form__title">Billed To: </h4>
                                                     <p class="sherah-invoice-form__text">John Smith</p>
                                                     <p class="sherah-invoice-form__text">Apt. 4B</p>
                                                     <p class="sherah-invoice-form__text">Springfield, ST 54321</p>
                                                </div>
                                                <div class="sherah-invoice-form__single sherah-invoice-form__single--right">
													<h4 class="sherah-invoice-form__title">Shipped To:</h4>
													<p class="sherah-invoice-form__text">Kenny Rigdon</p>
													<p class="sherah-invoice-form__text">1234 Main</p>
													<p class="sherah-invoice-form__text">Apt. 4B</p>
													<p class="sherah-invoice-form__text">Springfield, ST 54321</p>
                                               </div>
                                            </div>
                                            <div class="sherah-invoice-form__first sherah-invoice-form__first--print">
                                                <div class="sherah-invoice-form__single">
													<h4 class="sherah-invoice-form__title">Payment Method:</h4>
                                                    <p class="sherah-invoice-form__text">Visa ending **** 4242</p>
                                                    <p class="sherah-invoice-form__text">sherahinfo@email.com</p>
                                                </div>
                                                <div class="sherah-invoice-form__single sherah-invoice-form__single--right">
                                                    <h4 class="sherah-invoice-form__title">Order Date:</h4>
                                                    <p class="sherah-invoice-form__text">November 02, 2022</p>
                                               </div>
                                            </div>
                                        </div>
                                        <!-- End Sherah Invoice -->

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="sherah-table-order">
                                                    <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1">
                                                        <thead class="sherah-table__head">
                                                            <tr>
                                                                <th class="sherah-table__column-1 sherah-table__h1">No</th>
                                                                <th class="sherah-table__column-2 sherah-table__h2">Products name</th>
                                                                <th class="sherah-table__column-3 sherah-table__h3">Price</th>
                                                                <th class="sherah-table__column-4 sherah-table__h4">Quantity</th>
                                                                <th class="sherah-table__column-4 sherah-table__h4">Total Amount</th>
                                                            </tr>
                                                        </thead> 
                                                        <tbody class="sherah-table__body">
                                                            <tr>
                                                                <td class="sherah-table__column-4 sherah-table__data-1">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">01</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__product-name">
                                                                        <h4 class="sherah-table__product-name--title">Polka Dots Woman Dress</h4>
                                                                        <p class="sherah-table__product-name--text">Color : Black</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">$612</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">2</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc"> $1,224</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="sherah-table__column-4 sherah-table__data-1">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">02</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__product-name">
                                                                        <h4 class="sherah-table__product-name--title">Sweater For Women</h4>
                                                                        <p class="sherah-table__product-name--text">Color : Light White</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">$120</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">1</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">$120</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="sherah-table__column-4 sherah-table__data-1">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">03</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__product-name">
                                                                        <h4 class="sherah-table__product-name--title">Convert for man shoe</h4>
                                                                        <p class="sherah-table__product-name--text">Color : Black & Orange</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-3 sherah-table__data-3">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">$450</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">3</p>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-4 sherah-table__data-4">
                                                                    <div class="sherah-table__product-content">
                                                                        <p class="sherah-table__product-desc">$1,350</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="order-totals">
                                                        <ul class="order-totals__list">
                                                            <li class="order-totals__list--sub"><span>Subtotal</span> <span class="order-totals__amount">$790</span></li>
                                                            <li><span>Store Credit</span> <span class="order-totals__amount">$-20</span></li>
                                                            <li><span>Delivery Charges</span> <span class="order-totals__amount">$30</span></li>
                                                            <li><span>Shipping</span> <span class="order-totals__amount">$25</span></li>
                                                            <li><span>Vat Tax</span> <span class="order-totals__amount">$35</span></li>
                                                            <li class="order-totals__bottom"><span>Total</span> <span class="order-totals__amount">$35</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mg-top-30">
                                                <h4 class="mg-btm-10">Notes: </h4> 
                                                <p>All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days</p>
                                                <p>the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</p> 
                                            </div>
                                        </div>     
                                        
                                        
									</div>
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>

                        
						
						
					</div>	
				</div>	
			</section>	
			<!-- End sherah Dashboard -->
			
		</div>
		
		<!-- sherah Scripts -->
		<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jquery-migrate.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/charts.js') }}"></script>
		<script src="{{ asset('backend/assets/js/final-countdown.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/fancy-box.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/fullcalendar.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/datatables.min.js') }}"></script> 
		<script src="{{ asset('backend/assets/js/circle-progress.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jquery-jvectormap.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jvector-map.js') }}"></script>
	
        <script src="{{ asset('backend/assets/js/main.js') }}"></script>
		<script>
			$('#sherah-table__vendor').DataTable({
					searching: true,
					info: false,
					lengthChange: true,
					scrollCollapse: true,
					paging: true,
					language: {
						paginate: {
							next: '<i class="fas fa-angle-right"></i>', // Font Awesome class for next button
							previous: '<i class="fas fa-angle-left"></i>' // Font Awesome class for previous button
						},
						lengthMenu: 'Showing _MENU_',
						searchPlaceholder: 'Search...',
						search: '<span class="sherah-data-table-label">Search</span>',
						
					}
				});
		</script>
		
	</body>
</html>
		