
				$.getJSON('lib/json-balance.php', function(data) {
					chart = new Highcharts.StockChart({
						chart: {
							renderTo: 'balance'
						},
						rangeSelector: {
							selected: 4
						},
						title: {
							text: 'History Balance'
						},
						series: [{
							name: 'Balance',
							data: data,
							tooltip: {
								valueDecimals: 0
							}
						}]
					});
				});