fetch('../include/data.php')
  .then(response => response.json())
  .then(data => {
    if (!Array.isArray(data) || data.length === 0) {
      console.error('No valid data received.');
      return;
    }

    if (!data[0].hasOwnProperty('tag_rfid') || !data[0].hasOwnProperty('scan_time')) {
      console.error('Missing required fields: tag_rfid or scan_time');
      return;
    }

    // แปลง scan_time เป็นช่วงเวลา (เช่น ชั่วโมง)
    const checkinCounts = {};
    data.forEach(item => {
      let time = item.scan_time.split(" ")[1].substring(0, 5); // ดึงเฉพาะ HH:MM
      checkinCounts[time] = (checkinCounts[time] || 0) + 1;
    });

    // แปลงข้อมูลเป็น arrays สำหรับกราฟ
    const labels = Object.keys(checkinCounts).sort(); // เรียงตามเวลา
    const counts = Object.values(checkinCounts);

    // วาดกราฟ
    const ctx = document.getElementById("myAreaChart").getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels, // ใช้ช่วงเวลาเป็น labels
        datasets: [{
          label: "จำนวนการเช็คอิน",
          backgroundColor: "rgba(54, 162, 235, 0.2)",
          borderColor: "rgba(54, 162, 235, 1)",
          borderWidth: 1,
          data: counts,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          x: {
            grid: { display: false },
            ticks: { maxTicksLimit: 12 }
          },
          y: {
            ticks: { beginAtZero: true },
            grid: { color: "rgb(230, 230, 230)" }
          },
        }
      }
    });
  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });
