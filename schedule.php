<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<style>

.label { TEXT-ALIGN: left; FLOAT: left; FONT-SIZE: 12px; MARGIN-RIGHT: 10px }
LEGEND { PADDING-BOTTOM: 5px; MARGIN: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; FONT-SIZE: 15px; FONT-WEIGHT: bolder; PADDING-TOP: 5px }
	TABLE { MARGIN: 40px auto }
</style>
<main>
	<div class="main_schedule">
		<div class="image">
			<img src="images/navi_bg.gif" alt="" sizes="50%">
		</div>
		<div id="navigator">
			<span id="PageHeader"> <span style="font-size:10px">=></span> <a href="">Tra cứu lịch giảng dạy</a></span>
		</div>
	</div>
	<div class="main">
		<table id="TbSeach" cellSpacing="0" width="100%">
			<tbody>
				<tr>
					<td align="left"><span >Thông tin giảng viên (họ, tên)</span>
					<input name="txtStaffInfor" type="text"  style="width:300px;" />
					<input type="submit" name="btnSearch" value="Tìm" id="btnSearch" /></td>
				</tr>
				<tr>
					<td height="20"></td>
				</tr>
				<tr>
					<td align="left"><span id="lblOrderBy">Sắp xếp theo</span>
					<input id="rdoHoTen" type="radio" name="orderby" value="rdoHoTen" checked="checked" /><label for="rdoHoTen">Họ, tên</label>
					<input id="rdoKhoa_BoMon" type="radio" name="orderby" value="rdoKhoa_BoMon" /><label for="rdoKhoa_BoMon">Khoa, bộ môn</label>
				</td>
				<tr>
					<td colspan="3">
						<img id="Image1" src="style/images/Teacher_schedule.jpg" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</main>
<?php include "includes/footer.php" ?>