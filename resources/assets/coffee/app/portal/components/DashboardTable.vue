<template lang="pug">
    b-table(:data='sells', :striped='true', :hoverable='true', :mobile-cards='true')
        template(slot-scope='props')
            b-table-column(field='ticker.name', label='Валюта') {{ props.row.ticker.name }}
            b-table-column(field='value', label='Отправлено')
                | {{ props.row.volume ? props.row.volume : '?' }}
            b-table-column(field='income', label='Получено')
                | {{ props.row.income ? props.row.income.toFixed(2) + ' руб.' : '?' }}
            b-table-column(field='date', label='Дата') {{ props.row.date }}
            b-table-column(field='status.name', label='Статус')
                span.tag.is-primary(v-if='props.row.status.name == "complete"') Выполнено
                span.tag.is-danger(v-if='props.row.status.name == "cancelled"') Отменено
                span.tag.is-default(v-if='props.row.status.name == "waiting"') Ожидание
                span.tag.is-warning(v-if='props.row.status.name == "processing"') Выполнение
</template>

<script lang="coffee">
    export default
        props: ['sells']

        mounted: -> console.log @sells[0]
</script>
