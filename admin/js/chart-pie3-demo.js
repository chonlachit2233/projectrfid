fetch('../include/ple.php')
  .then(response => response.json())
  .then(data => {
    if (!Array.isArray(data) || data.length === 0) {
      console.error('No valid data received.');
      return;
    }

    if (!data[0].hasOwnProperty('activities') || !data[0].hasOwnProperty('count')) {
      console.error('Missing required fields: ma_name or count');
      return;
    }

    // เตรียมข้อมูลสำหรับกราฟ
    const labels = data.map(item => item.activities); // ใช้ ma_name เป็น labels
    const counts = data.map(item => item.count); // ใช้ count เป็น data

    // วาดกราฟ
    const ctx = document.getElementById("myPieChart").getContext('2d'); // ใช้ myPieChart สำหรับกราฟวงกลม
    new Chart(ctx, {
      type: 'pie', // กราฟแบบวงกลม
      data: {
        labels: labels, // ใช้ ma_name เป็น labels
        datasets: [{
          label: "จำนวนการเช็คอิน",
          backgroundColor: ["rgba(54, 162, 235, 0.2)", "rgba(255, 99, 132, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(255, 159, 64, 0.2)"], // ใส่สีต่างๆ สำหรับแต่ละส่วน
          borderColor: ["rgba(54, 162, 235, 1)", "rgba(255, 99, 132, 1)", "rgba(75, 192, 192, 1)", "rgba(153, 102, 255, 1)", "rgba(255, 159, 64, 1)"], // สีขอบ
          borderWidth: 1,
          data: counts, // จำนวนการเช็คอินในแต่ละกิจกรรม
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ': ' + tooltipItem.raw + ' คน'; // แสดงจำนวนคนใน tooltip
              }
            }
          }
        }
      }
    });
  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });
