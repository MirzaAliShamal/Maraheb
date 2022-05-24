
<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<a href="{{ route('home') }}" target="_blank">
						<img src="{{ asset('images/logo.png') }}" style="height: 60px" alt="logo">
							<tr>
								<td align="left" valign="center">
									<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
										<!--begin:Email content-->
										<div style="padding-bottom: 30px; font-size: 17px;">
											<strong>Hello!</strong>
										</div>
										<div style="padding-bottom: 30px">Please click the button below to verify your email address</div>

                                        <div style="padding-bottom: 40px; text-align:center;">
											<a href="{{ route('email.verify') }}?token={{ $token }}" style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#009EF7;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle" target="_blank">
                                                Verify Email Address
                                            </a>
										</div>

                                        <div style="padding-bottom: 30px">If you did not create an account, no further action is required</div>

										<div style="padding-bottom: 30px">
                                            <small>
                                                If you're having trouble clicking the button, copy and paste the URL below into your web browser
                                                <a href="{{ route('email.verify') }}?token={{ $token }}" target="_blank" style="text-decoration:none;color: #009EF7">
                                                    {{ route('email.verify') }}?token={{ $token }}
                                                </a>.
                                            </small>
                                        </div>
										<!--end:Email content-->
										<div style="padding-bottom: 10px">
                                            Kind regards,
                                            <br>
                                            The Maraheb Team.
                                                <tr>
                                                    <td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
                                                        <p>Floor 10, 101 Avenue of the Light Square, New York, NY, 10050.</p>
                                                        <p>Copyright ©
                                                        <a href="{{ route('home') }}" target="_blank">Maraheb</a>.</p>
                                                    </td>
                                                </tr>
                                            </br>
                                        </div>
									</div>
								</td>
							</tr>
						</img>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
