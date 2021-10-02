<script>
import { defineComponent } from 'vue'
import { Bar } from 'vue3-chart-v2'

export default defineComponent({
    props:['title','labels','data'],
  name: 'MonthlyChart',
  extends: Bar,
  mounted () {
    // Overwriting base render method with actual data.
    this.renderChart({
      labels: this.labels,
      datasets: [
        {
          label: this.title,
          backgroundColor: ['#f87979','#333'],
          data: this.data
        }
      ]
    }, {
        responsive: true,
        scales: {
        	yAxes: [{
            	ticks: {
                	beginAtZero: true
            	}
        	}]
    	}
    })
  }
})
</script>