@extends('layout')

@section('content')
<section id=""><!--form-->
	<div class="">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<?php
				$message =Session::get('message_1');
				if($message)
				{
					echo $message;
					Session::put('message_1',null);
				}
				?>
				<div class="login-form"><!--login form-->
					<h2>Đăng nhập tài khoản</h2>
					<form action="{{URL::to('/login-customer')}}" method="POST">
						{{ csrf_field() }}
						<input type="text" name="email_account" placeholder="Tài khoản" />
						<input type="Password"  name="password_account" placeholder="Mật khẩu" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Ghi nhớ đăng nhập
						</span>
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">HOẶC</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>Đăng kí tài khoản</h2>
					<form action="{{URL::to('/add-customer')}}" method="POST">

						{{ csrf_field()}}
						<input type="text" name="customer_name" placeholder="Họ và tên"/>
						<input type="email" name="customer_email" placeholder="Địa chỉ email"/>
						<input type="text" name="customer_phone" placeholder="Số điện thoại"/>
						<input type="Password" name="customer_pass" placeholder="Mật khẩu"/>
						<button type="submit" class="btn btn-default">Đăng kí</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection()