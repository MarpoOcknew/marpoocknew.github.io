<?php

return [
    'strings' => [
        'plugin_description' => 'Custom widgets for Google Analytics.',
        'barchart_label' => 'Google Analytics custom bar chart',
        'percentage_label' => 'Google Analytics custom percentage chart',
        'piechart_label' => 'Google Analytics custom pie chart',
    ],

    'barchart'   => [
        'widget_title'          => 'Widget title',
        'bar_chart'             => 'Bar Chart',
        'widget_title_required' => 'The Widget Title is required.',
        'dimension'             => 'Dimension',
        'invalid_dimension'     => 'That does not appear to be a valid analytics dimension',
        'metric'                => 'Metric',
        'invalid_metric'        => 'That does not appear to be a valid analytics metric.',
        'chart_height'          => 'Chart height',
        'invalid_chart_height'  => 'Please specify the chart height as an integer value.',
        'legend_as_table'       => 'Display legend as a table',
        'days_to_display'       => 'Days to display',
        'results_to_display'    => 'Results to display',
        'zero_displays_all'     => 'A value of 0 will display all results.',
        'raport_description'    => 'Report description',
    ],
    'percentage' => [
        'widget_title'       => 'Widget title',
        'percentage_chart'   => 'Percentage Chart',
        'title_required'     => 'The Widget Title is required.',
        'dimension'          => 'Dimension',
        'invalid_dimension'  => 'That does not appear to be a valid analytics dimension.',
        'metric'             => 'Metric',
        'invalid_metric'     => 'That does not appear to be a valid analytics metric.',
        'dimension_label'    => 'Dimension label',
        'metric_label'       => 'Metric label',
        'days_to_display'    => 'Days to display',
        'results_to_display' => 'Results to display',
        'zero_displays_all'  => 'A value of 0 will display all results.',
    ],
    'piechart' => [
        'widget_title' => 'Widget title',
        'pie_chart' => 'Pie Chart',
        'title_required' => 'The Widget Title is required.',
        'dimension' => 'Dimension',
        'invalid_dimension' => 'That does not appear to be a valid analytics dimension.',
        'metric' => 'Metric',
        'invalid_metric' => 'That does not appear to be a valid analytics metric.',
        'chart_radius' => 'Chart radius',
        'chart_size_invalid' => 'Please specify the chart size as an integer value.',
        'center_chart' => 'Center the chart',
        'legend_as_table' => 'Display legend as a table',
        'display_total' => 'Display total',
        'days_to_display' => 'Days to display',
        'results_to_display' => 'Results to display',
        'zero_displays_all' => 'A value of 0 will display all results.',
        'report_description' => 'Report description',
    ],
    'errors' => [
        'invalid_days' => 'Invalid days value: ',
        'invalid_dimension' => 'Invalid dimension value: ',
        'invalid_metric' => 'Invalid metric value: ',
    ]

];