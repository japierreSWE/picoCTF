TabbedArea = ReactBootstrap.TabbedArea
TabPane = ReactBootstrap.TabPane

ManagementTabbedArea = React.createClass
  getInitialState: ->
    updates: []
    problems: []
    tabKey: 1

  componentDidMount: ->
    # Formatting hack
    $("#main-content").prepend """
      <div class="col-md-2 fill-container" id="aux-pane"></div>
    """
    $("#main-content>.container").addClass("col-md-10")

    apiCall "GET", "/api/admin/problems"
    .done ((api) ->
      @setState React.addons.update @state,
        {problems: {$set: api.data}}
    ).bind this

  onTabSelect: (tab) ->
    @setState React.addons.update @state,
      tabKey:
        $set: tab

  render: ->
      <TabbedArea activeKey={@state.tabKey} onSelect={@onTabSelect}>
        <TabPane eventKey={1} tab='Manage Problems'>
          <ProblemTab problems={@state.problems}/>
        </TabPane>
        <TabPane eventKey={2} tab='Exceptions'>
          <ExceptionTab/>
        </TabPane>
        <TabPane eventKey={3} tab='Load Problems'>
          <ProblemLoaderTab/>
        </TabPane>
      </TabbedArea>

$ ->
  React.render <ManagementTabbedArea/>, document.getElementById("management-tabs")
