<table>
    <thead>
        <tr>
            <th colspan="{{ $form->questions->count() }}" style="text-align:center;font-weight:bold;font-size:24px;">{{ $form->title }}</th>
        </tr>
        <tr>
            <th colspan="{{ $form->questions->count() }}" style="text-align:center;font-weight:bold;font-size:24px;">{{ $form->description }}</th>
        </tr>
        <tr></tr>
        <tr></tr>
    </thead>
    <tbody>
        <tr>
            @foreach($form->questions as $question)
                <th style="font-weight:bold; background: #444; color:white;">{{ $question->text }}</th>
            @endforeach
        </tr>
        @foreach($formResponses as $formResponse)
        <tr>
            @foreach($formResponse->responses as $response)
                <td>{{ $response->value }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>