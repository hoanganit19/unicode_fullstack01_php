const province = document.querySelector("#province");
const district = document.querySelector("#district");
const ward = document.querySelector("#ward");

province.addEventListener("change", async (e) => {
  const provinceId = e.target.value;

  if (provinceId > 0) {
    const res = await fetch(`./server/get_district.php?province=${provinceId}`);
    const data = await res.json();
    if (data.status == "success") {
      let option = '<option value="0">Chọn Quận/Huyện</option>\n';
      let { data: districtList } = data;
      if (districtList.length) {
        districtList.forEach(({ id, _name, _prefix }) => {
          option += `<option value="${id}">${_prefix + " " + _name}</option>\n`;
        });
      }
      district.innerHTML = option;
    }
  }
});

district.addEventListener("change", async (e) => {
  const districtId = e.target.value;

  if (districtId > 0) {
    const res = await fetch(`./server/get_ward.php?district=${districtId}`);
    const data = await res.json();
    if (data.status == "success") {
      let option = '<option value="0">Chọn Xã/Phường</option>\n';
      let { data: wardList } = data;
      if (wardList.length) {
        wardList.forEach(({ id, _name, _prefix }) => {
          option += `<option value="${id}">${_prefix + " " + _name}</option>\n`;
        });
      }
      ward.innerHTML = option;
    }
  }
});
