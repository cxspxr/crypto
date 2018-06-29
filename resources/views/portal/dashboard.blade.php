@extends('layout/portal')

@section('content')

    <div class="dashboard" id="dashboard">
        <b-table
            :data='@json("sells")'
            :striped="true"
            :hoverable="true"
            :mobile-cards="true"
        >
            <template slot-scope="props">
                <b-table-column field="transaction" label="ID" numeric>
                    {{ props.row.transaction }}
                </b-table-column>
                <b-table-column field="status.name" label="Статус">
                    <span class="tag is-success" v-if="props.row.status == 'success'">
                        Выполнено
                    </span>
                    <span class="tag is-danger" v-if="props.row.status == 'cancelled'">
                        Отменено
                    </span>
                    <span class="tag is-default" v-if="props.row.status == 'waiting'">
                        Ожидание
                    </span>
                    <span class="tag is-warning" v-if="props.row.status == 'processing'">
                        Выполнение
                    </span>

                </b-table-column>
            </template>
        </b-table>
    </div>

@endsection
