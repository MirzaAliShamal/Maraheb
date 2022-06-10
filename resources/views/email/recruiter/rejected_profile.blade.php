<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<a href="{{ url('/') }}" target="_blank">
						<img src="{{ asset('images/logo.png') }}" style="height: 60px" alt="logo">
							<tr>
								<td align="left" valign="center">
									<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
                                        <div style="padding-bottom: 30px; font-size: 17px;">
											<strong>Hello {{ $user->name }}!</strong>
										</div>
										<div style="padding-bottom: 30px">
                                            Unfortunately! we have decided not to approve your profile of recruiter. <br>
                                            <br>
                                            You are allowed to submit your profile again with updated information, our team will review it again and inform you accordingly. <br>
                                            <br>
                                            Thanks again for your interest in Maraheb and we wish you luck.
                                        </div>

										<!--end:Email content-->
										<div style="padding-bottom: 10px">Kind regards,
										<br>The Maraheb Team.

										<tr>
											<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
												<p>Floor 10, 101 Avenue of the Light Square, New York, NY, 10050.</p>
												<p>Copyright ©
												<a href="{{ url('/') }}" target="_blank">Maraheb</a>.</p>
											</td>
										</tr></br></div>
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
