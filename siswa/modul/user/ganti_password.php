<div class="col-md-4 mt-3">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url('../assets/img/user/bgrpl.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="https://i.pinimg.com/564x/b8/5f/3a/b85f3a28fd572685b0dab45537113294.jpg<?=$data['foto'];?>" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name"><?=$data['nama_siswa'] ?></div>
										<div class="job"><?=$data['nis'] ?></div>
										<div class="desc">Kelas (<?=$data['nama_kelas'] ?>)</div>

										<form action="">
											<div class="form-group">												
											<input type="password" name="pass1" class="form-control" placeholder="Password Lama">
											</div>
											<div class="form-group">												
											<input type="password" name="pass2" class="form-control" placeholder="Password Baru">
											</div>

											<div class="form-group">												
											<input type="password" name="pass3" class="form-control" placeholder="Konfirmasi Password">
											</div>

										<div class="view-profile mt-3">
											<button type="submit" class="btn btn-secondary btn-block">Ganti Password</button>
										</div>
										</form>

									</div>
								</div>
								
							</div>
						</div>
						